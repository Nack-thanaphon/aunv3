<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Gallery_model extends CI_Model
{

    public function get_gallery()
    {
        $query = $this->db->select('*');
        $query = $this->db->from('tbl_gallery');
        $this->db->join('tbl_images', 'tbl_images.g_id=tbl_gallery.g_id');
        $query = $this->db->group_by("tbl_gallery.g_id");

        $query = $this->db->get();

        $result = [];

        foreach ($query->result() as $row) { //การปั้น array

            $date = DateThai($row->g_date);
            // strMonthThai;
            $result[] = array(
                "g_id" => $row->g_id,
                "g_name" => $row->g_name,
                "g_detail" => $row->g_detail,
                "g_image" => $row->i_name,
                "g_date" => $date,
            );
        }


        return $result;
    }


    public function getbanner()
    {
        $query = $this->db->select('*');
        $query = $this->db->from('banner');
        $query = $this->db->where('status =', '1');
        $query = $this->db->order_by('id', 'desc');
        // $this->db->join('tbl_images', 'tbl_images.g_id=tbl_gallery.g_id');
        // $query = $this->db->group_by("tbl_gallery.g_id");

        $query = $this->db->get();

        $result = [];

        foreach ($query->result() as $row) { //การปั้น array

            $ContDateleft = getDateEndInt($row->enddate);


            if ($ContDateleft >= 0) {
                // strMonthThai;
                $result[] = array(
                    "id" => $row->id,
                    "name" => $row->title,
                    "image" => $row->img
                );
            }
        }


        return $result;
    }


    public function getbannerbyId()
    {
        $query = $this->db->select('*');
        $query = $this->db->from('banner');
        $query = $this->db->where('status =', '1');
        $query = $this->db->order_by('id', 'desc');
        // $this->db->join('tbl_images', 'tbl_images.g_id=tbl_gallery.g_id');
        // $query = $this->db->group_by("tbl_gallery.g_id");

        $query = $this->db->get();

        $result = [];

        foreach ($query->result() as $row) { //การปั้น array

            // strMonthThai;
            $result[] = array(
                "id" => $row->id,
                "name" => $row->title,
                "image" => $row->img
            );
        }


        return $result;
    }
    public function getImageDataById()
    {

        $id = 1;
        $image_condition = array('gallery_id' => $id);
        $image = $this->db->select('*');
        $image = $this->db->from('image');
        $image = $this->db->where($image_condition);

        $imageData =  $image->get()->result();


        $result = [];
        $cover = [];
        $imageAll = [];


        foreach ($imageData as $image) {
            if ($image->cover == 1) {
                $cover = $image->name;
            } else {
                $imageAll[] = $image->name;
            }
        }
        $result = array(
            'cover' => $cover,
            'image' => $imageAll,
        );


        return $result;
    }
    public function getImageData($titleData = Null, $type = Null, $month = Null)
    {


        $gallery = $this->db->select('*, gallery.name as g_name,gallery.id as id');
        $gallery = $this->db->from('gallery');
        $gallery = $this->db->join('image', 'image.gallery_id = gallery.id');
        $gallery = $this->db->where('gallery.status', 1);
        if (!empty($titleData)) {
            $gallery = $this->db->like('gallery.name', $titleData);
        }
        if (!empty($month)) {
            $gallery = $this->db->like('gallery.date', $month);
        }

        $gallery = $this->db->group_by("gallery.id");
        $gallery = $this->db->order_by("gallery.id", "desc");
        $galleryData =   $gallery->get()->result();


        $result = [];

        $imageData = [];
        $imageData['cover'] = [];
        $imageData['all'] = [];
        $imageData['id'] = [];


        foreach ($galleryData as $key => $row) {

            $imageData['id'] = $row->id;

            if ($row->cover == 1) {
                $imageData['cover'] = $row->name;
            }

            $result[] = array(
                'id' => $row->id,
                'title' => $row->g_name,
                'detail' => $row->detail,
                'date' => $row->date,
                'image' => $imageData,
            );
        }


        return $result;
    }


    // // public function get_type($table,$join,$query)
    // public function get_type()
    // {
    //     $this->db->select('*');
    //     $this->db->from('gallery_group');

    //     $query = $this->db->get()->result();

    //     $result = [];
    //     foreach ($query as $row) { //การปั้น array

    //         $result[] = array(
    //             "type" => $row->g_name,
    //             "typeId" => $row->g_id,
    //         );
    //     }

    //     return $result;
    // }

    public function get_month()
    {
        $query = $this->db->from('gallery');
        $query = $this->db->select('date,id,CONCAT(MONTH(date),YEAR(date)) as monthyear,YEAR(date) as year');
        $query = $this->db->group_by(array("monthyear"));
        $query = $this->db->order_by("date", "desc");
        $this->db->limit(12);

        $query = $this->db->get();

        $result = [];
        foreach ($query->result() as $row) { //การปั้น array

            $Yearmonth = Yearmonth($row->date);
            $month = Year($row->date);
            $monthData = $this->get_news_bymonthlist($Yearmonth);
            // print_r($Yearmonth);
            // print_r($month);

            $result[] = array(
                "month" => $month,
                "monthData" => $monthData,
                "id" => $row->id,
            );
        }

        return $result;
    }


    public function get_news_bymonthlist($month)
    {
        $this->db->select('*');
        $this->db->from('gallery');
        $this->db->like('date', $month);

        $query = $this->db->get();

        $result = [];

        foreach ($query->result() as $row) {
            // $datelist = DateThai($row->date);

            $result[] = array(
                "id" => $row->id,
                "datelist" => $row->date,
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
}
