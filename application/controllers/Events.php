<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Events extends MY_Controller
{

    public function index()
    {
        $this->data['title'] = 'กิจกรรม';
        $this->data['type'] = $this->Event_model->get_type();
        $this->data['date'] = '';

        $this->middle = 'events/index';

        $this->layout();
    }

    public function views($id)
    {
        $this->data['news'] = $this->Event_model->getnewssingleImg($id);
        $this->data['title'] = $this->data['news'][0]['title'];
        $this->data['img'] = $this->data['news'][0]['cover'];

        $this->middle = 'news/view';
        $this->layout();
    }

    public function getData()
    {
        $title = $this->input->post('title');
        $type = $this->input->post('type');
        $month = $this->input->post('month');

        $data = $this->Event_model->getData($title, $type, $month);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }


    public function geteventsApi()
    {
        $title = $this->input->post('title');
        $type = $this->input->post('type');
        $month = $this->input->post('month');

        $data = $this->Event_model->getData($title, $type, $month);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    public function geteventbyId()
    {
        $id = $this->input->post('id');

        $data = $this->Event_model->geteventbyId($id);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    
}
