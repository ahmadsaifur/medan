<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Layanan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Dokter_model', 'Dokter');
    }
    public function gigi()
    {
        $slug = $this->uri->segment(3);
        $post = $this->Dokter->fetch_data('article')->result();
        $postid = $this->Dokter->fetch_data('article', ['slug' => $slug])->row();
        $data['uri'] = $slug;
        $data['title'] = $postid->title;
        $data['headmeta'] = " Alkindi  ";
        $data['post'] = $post;
        $data['artikel'] = $postid;
        $data['data'] =
            [
                'title' => $postid->title,
                'headmeta' => 'Alkindi ',
                'post' => $post,
                'artikel' => $postid
            ];
        $this->template->load('template', 'home/' . $slug, $data);
    }

    public function behelgigi()
    {
        $uri = $this->uri->segment(2);
        $post = $this->Dokter->fetch_data('article')->result();
        $postid = $this->Dokter->fetch_data('article', ['slug' => $uri])->row();
        $data['uri'] = $uri;
        $data['title'] = $postid->title;
        $data['headmeta'] = " Alkindi  ";
        $data['post'] = $post;
        $data['artikel'] = $postid;
        $data['data'] =
            [
                'title' => "Gigi Sehat | Behel Gigi",
                'headmeta' => 'Alkindi ',
                'post' => $post,
                'artikel' => $postid
            ];
        $this->template->load('template', 'home/' . $uri, $data);
    }
    public function scalling()
    {
        $post = $this->Dokter->fetch_data('article')->result();
        $postid = $this->Dokter->fetch_data('article', ['slug' => 'scalling'])->row();
        $slug = 'scalling';
        $data['title'] = "Gigi Sehat";
        $data['headmeta'] = " Alkindi  ";
        $data['artikel'] = $postid;
        $data['data'] =
            [
                'title' => "Gigi Sehat | Scalling Gigi",
                'headmeta' => 'Alkindi ',
                'artikel' => $postid,
                'post' => $post,
            ];
        $this->template->load('template', 'home/' . $slug, $data);
    }
    public function bleaching()
    {
        $post = $this->Dokter->fetch_data('article')->result();
        $postid = $this->Dokter->fetch_data('article', ['slug' => 'bleaching'])->row();
        $slug = 'scalling';
        $data['title'] = "Gigi Sehat";
        $data['headmeta'] = " Alkindi  ";
        $data['post'] = $post;
        $data['data'] =
            [
                'title' => "Gigi Sehat | Bleaching Gigi",
                'headmeta' => 'Alkindi ',
                'artikel' => $postid,
                'post' => $post,
            ];
        $this->template->load('template', 'home/' . $slug, $data);
    }
}
