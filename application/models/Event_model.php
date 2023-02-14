<?php

use LDAP\Result;

defined('BASEPATH') or exit('No direct script access allowed');

class Event_model extends CI_Model
{


    public function get_events()
    {
        $query = $this->db->select('*');
        $query = $this->db->from('events');
        $this->db->join('events_type', 'events.id = events_type.id');
        $query = $this->db->order_by("events.id", 'desc');

        $query = $this->db->get();

        $result = [];

        foreach ($query->result() as $row) { //การปั้น array

            $date = Datethai($row->start);

            $result[] = array(
                "id" => $row->id,
                "title" => $row->title,
                "type" => $row->title,
                "date" => $date,
                "time_start" => $row->time_start,
                "time_end" => $row->time_end,
                "address" => $row->address,
            );
        }


        return $result;
    }

    public function get_eventest()
    {
        $this->db->select('*,events.id as id');
        $this->db->order_by("events.id", "desc");
        $this->db->limit(3);
        $this->db->join('events_type', 'events.typeid = events_type.id');
        $query = $this->db->get('events');

        $result = [];

        foreach ($query->result() as $row) { //การปั้น array

            $datelist = DateThai($row->start);
            $result[] = array(
                "id" => $row->id,
                "title" => $row->title,
                "type" => $row->title,
                "date" => $datelist,
                "address" => $row->address,
            );
        }
        return $result;
    }

    public function getData($titleData = Null, $type = Null, $month = Null)
    {

        $this->db->select('*,events.id as id');
        $this->db->from('events');
        $this->db->join('events_type', 'events.typeid = events_type.id');
        // $this->db->where('events.status', 'กำลังดำเนินการ');
        $this->db->limit(12);

        if (!empty($titleData)) {
            $this->db->like('events.title', $titleData);
        }
        if (!empty($type)) {
            $this->db->where('events.typeid', $type);
        }
        if (!empty($month)) {
            $this->db->like('events.created_at', $month);
        }
        $this->db->order_by("events.id", "desc");
        $query = $this->db->get();

        return $query->result();
    }
    public function get_month()
    {
        $query = $this->db->select('start,id,CONCAT(MONTH(start),YEAR(start)) as monthyear,YEAR(start) as year');
        // $query = $this->db->select('*');
        $query = $this->db->from('events');
        $query = $this->db->group_by(array("monthyear"));
        $query = $this->db->order_by("id", "desc");
        $this->db->limit(12);

        $query = $this->db->get();
        foreach ($query->result() as $row) { //การปั้น array


            $date = Year($row->start);
            $Yearmonth = Yearmonth($row->start);
            $month = $this->get_events_bymonthlist($Yearmonth);
            // print_r($Yearmonth);

            $result[] = array(
                "id" => $row->id,
                "date" => $date,
                "month" => $month,
            );
        }

        return $result;
    }

    public function get_events_bymonthlist($month)
    {
        $this->db->select('*');
        $this->db->from('events');
        $this->db->like('start', $month);

        $query = $this->db->get();

        $result = [];

        foreach ($query->result() as $row) { //การปั้น array
            $datelist = DateThai($row->start);

            $result[] = array(
                "id" => $row->id,
                "datelist" => $datelist,
            );
        }
        return $result;
    }

    public function geteventsApi()
    {

        $this->db->select('*');
        $this->db->from('events');

        $DataEvents = $this->db->get()->result();
        $EventData = [];
        foreach ($DataEvents as $value) {
            /// DateChangeFormat
            // print_r($value)
            $start = DateFormat($value->start);
            $end = DateFormat($value->end);


            $EventData[] = array(
                'id' => $value->id,
                'title' => $value->title,
                'start' =>  $start,
                'end' =>  $end,
                'time_start' => $value->time_start,
                'time_end' => $value->time_end,
            );
        }


        return $EventData;
    }






    public function geteventbyId($id)
    {

        $this->db->select('*,events_type.name as type')
            ->from('events')
            ->join('events_type', 'events.typeid = events_type.id')
            ->where('events.id =', $id);

        $query = $this->db->get();
        $data = $query->result();

        $result = [];
        foreach ($data as $row) {

            $ContDateleft = getDateEndInt($row->end);
            $result = array(
                "title" => $row->title,
                'detail' => $row->detail,
                "address" => $row->address,
                "type" => $row->type,
                'link' => $row->link,
                'img' => $row->imgcover,
                'file' => $row->docfile,
                'start' => $row->start,
                'end' => $row->end,
                'status' => $row->status,
                'time_start' => $row->time_start,
                'time_end' => $row->time_end,
                'created' => $row->created_at,
                'ContDateleft' => $ContDateleft
            );
        }
        return  $result;
    }

    public function get_type()
    {
        $this->db->select('*');
        $this->db->from('events_type');

        $query = $this->db->get()->result();

        $result = [];
        foreach ($query as $row) { //การปั้น array

            $result[] = array(
                "type" => $row->name,
                "typeId" => $row->id,
            );
        }

        return $result;
    }
}
