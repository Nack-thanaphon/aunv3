<?php

use LDAP\Result;

defined('BASEPATH') or exit('No direct script access allowed');

class News_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $ci = get_instance();
        $ci->load->helper('menu_helper'); // call helpers fucntion
    }

    public function get_news()
    {
        $query = $this->db->select('*');
        $query = $this->db->from('posts');
        $query = $this->db->order_by("p_created_at", 'desc');

        $query = $this->db->get();

        $result = [];

        foreach ($query->result() as $row) { //การปั้น array

            $date = DateThai($row->p_created_at);
            // strMonthThai;
            $result[] = array(
                "n_name" => $row->n_name,
                "date" => $date,
                "id" => $row->id,
                "n_image" => $row->n_image,
            );
        }


        return $result;
    }

    public function get_newest()
    {

        $this->db->select(['p.id as id', 'p.p_title as title', 'pt.pt_name as type', 'p.p_views as view', 'i.name as image', 'p.p_created_at as date']);
        $this->db->from('posts as p');
        $this->db->join('posts_type as pt', 'p.p_type_id = pt.pt_id');
        $this->db->join('image as i', 'p.id = i.post_id');
        $this->db->where('i.cover', 1);
        $this->db->limit(3);
        $this->db->order_by("p.id", "desc");
        $query = $this->db->get();

        return $query->result();
    }


    public function getnewsData($titleData = Null, $type = Null, $month = Null)
    {

        $this->db->select(['p.id as id', 'p.p_title as title', 'pt.pt_name as type', 'p.p_date as dateStr', 'pt.pt_id as typeid', 'p.p_views as view', 'i.name as image', 'p.p_created_at as date']);
        $this->db->from('posts as p');
        $this->db->join('posts_type as pt', 'p.p_type_id = pt.pt_id');
        $this->db->join('image as i', 'p.id = i.post_id');
        $this->db->where('i.cover', 1);


        if (!empty($titleData)) {
            $this->db->like('p.p_title', $titleData);
        }
        if (!empty($type)) {
            $this->db->where('p.p_type_id', $type);
        }
        if (!empty($month)) {
            $this->db->like('p.p_created_at', $month);
        }

        $this->db->order_by("p.id", "desc");
        $query = $this->db->get();

        return $query->result();
    }



    public function get_news_month()
    {

        $query = $this->db->from('posts');
        $query = $this->db->select('p_created_at,id,CONCAT(MONTH(p_created_at),YEAR(p_created_at)) as monthyear,YEAR(p_created_at) as year');
        $query = $this->db->group_by(array("monthyear"));
        $query = $this->db->order_by("p_created_at", "desc");
        $this->db->limit(12);

        $query = $this->db->get();

        $result = [];
        foreach ($query->result() as $row) { //การปั้น array

            $Yearmonth = Yearmonth($row->p_created_at);
            $month = Year($row->p_created_at);
            $monthData = $this->get_news_bymonthlist($Yearmonth);
            // print_r($Yearmonth);
            // print_r($month);

            $result[] = array(
                "month" => $month,
                "monthValue" => $Yearmonth,
                "monthData" => $monthData,
                "id" => $row->id,
            );
        }

        return $result;
    }


    public function get_news_bymonthlist($month)
    {
        $this->db->select('*');
        $this->db->from('posts');
        $this->db->like('p_created_at', $month);

        $query = $this->db->get();

        $result = [];

        foreach ($query->result() as $row) {
            // $datelist = DateThai($row->p_created_at);

            $result[] = array(
                "id" => $row->id,
                "datelist" => $row->p_created_at,
            );
        }
        return $result;
    }



    public function get_news_single($id)
    {
        $this->db->select('*,posts.id as id,image.id as imageId');
        $this->db->from('posts');
        $this->db->join('posts_type', 'posts.p_type_id = posts_type.pt_id');
        $this->db->join('image', 'posts.id = image.post_id');
        $this->db->where('posts.id =', $id);

        $query = $this->db->get();

        return $query->result();
    }

    public function get_newstype()
    {
        $this->db->select('*');
        $this->db->from('posts_type');

        $query = $this->db->get()->result();

        $result = [];
        foreach ($query as $row) { //การปั้น array

            $result[] = array(
                "type" => $row->pt_name,
                "typeId" => $row->pt_id,
            );
        }

        return $result;
    }


    public function getnewssingleImg($id)
    {
        $posts = $this->db->select('*');
        $posts = $this->db->from('posts');
        $posts = $this->db->join('posts_type', 'posts.p_type_id = posts_type.pt_id');
        $posts = $this->db->where('posts.id =', $id);

        $postsData = $posts->get()->result();
        $image_condition = array('post_id' => $id);

        $image = $this->db->select('*');
        $image = $this->db->from('image');
        $image = $this->db->where($image_condition);

        $imageData =  $image->get()->result();


        $result = [];
        $cover = [];
        $imageAll = [];


        foreach ($postsData as $posts) {
            $date = DateThai($posts->p_created_at);

            foreach ($imageData as $image) {
                if ($image->cover == 1) {
                    $cover = $image->name;
                } else {
                    $imageAll[] = $image->name;
                }
            }

            $result[] = array(
                'id' => $posts->id,
                'title' => $posts->p_title,
                'type' => $posts->pt_name,
                'detail' => $posts->p_detail,
                'views' => $posts->p_views,
                'date' => $date,
                'cover' => $cover,
                'image' => $imageAll,
            );
        }

        return $result;
    }
}
