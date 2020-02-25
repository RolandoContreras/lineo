<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sitemap extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model("category_model","obj_category");
        $this->load->model("courses_model","obj_courses");
        $this->load->model("videos_model","obj_videos");
    }
	public function index()
	{
            //get data category
             $obj_category = $this->nav_category();
            //get data courses
            $params_course = array(
                                    "select" =>"courses.course_id,
                                                courses.category_id,
                                                courses.name,
                                                courses.slug,
                                                courses.date,
                                                category.name as category_name,
                                                category.slug as category_slug",
                                    "join" => array( 'category, courses.category_id = category.category_id'),
                                    "where" => "courses.active = 1",
                                    "order" => "courses.course_id DESC",
                                );  
            $obj_courses = $this->obj_courses->search($params_course);
            $codigo='<?xml version="1.0" encoding="UTF-8"?>
                <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
            foreach ($obj_courses as $value) {
                $codigo .='<url>
                <loc>'.site_url()."cursos/".$value->category_slug."/".$value->slug;
                $codigo .='</loc>
                <lastmod>'.$value->date.'</lastmod>
                <changefreq>weekly</changefreq>
                <priority>0.80</priority>
                </url>';
            }
            
            foreach ($obj_category as $value) {
                $codigo .='<url>
                <loc>'.site_url()."cursos/".$value->slug;
                $codigo .='</loc>
                <lastmod>'.$value->date.'</lastmod>
                <changefreq>weekly</changefreq>
                <priority>0.80</priority>
                </url>';
            }
            
            $codigo .='<url>';
            $codigo .='<loc>'. site_url().'</loc>';
            $codigo .='<changefreq>weekly</changefreq>
                       <priority>0.80</priority>';
            $codigo .='</url>';
            $codigo .='<url>';
            $codigo .='<loc>'. site_url().'home'.'</loc>';
            $codigo .='<changefreq>weekly</changefreq>
                       <priority>0.80</priority>';
            $codigo .='</url><br/>';
            $codigo .='<url>';
            $codigo .='<loc>'. site_url().'contacto'.'</loc>';
            $codigo .='<changefreq>weekly</changefreq>
                       <priority>0.80</priority>';
            $codigo .='</url>';
            $codigo .='<url>';
            $codigo .='<loc>'. site_url().'registro'.'</loc>';
            $codigo .='<changefreq>weekly</changefreq>
                       <priority>0.80</priority>';
            $codigo .='</url>';
            $codigo .='<url>';
            $codigo .='<loc>'. site_url().'login'.'</loc>';
            $codigo .='<changefreq>weekly</changefreq>
                       <priority>0.80</priority>';
            $codigo .='</url>';
            $codigo .='<url>';
            $codigo .='<loc>'. site_url().'terminos-condiciones'.'</loc>';
            $codigo .='<changefreq>weekly</changefreq>
                       <priority>0.80</priority>';
            $codigo .='</url>';
            $codigo .='<url>';
            $codigo .='<loc>'. site_url().'politica-privacidad'.'</loc>';
            $codigo .='<changefreq>weekly</changefreq>
                       <priority>0.80</priority>';
            $codigo .='</url>';
            $codigo .='</urlset>';
            $path = "sitemap.xml";
            $modo = "w+";

            if ($fp=fopen($path,$modo)){
            fwrite ($fp,$codigo);
                echo "Se realizo con Exito";
            }
            else{
                echo "Error";
            }

	}
        
        public function nav_category(){
            $params_category = array(
                        "select" =>"category_id,
                                    slug,
                                    name,
                                    date",
                "where" => "active = 1",
                "order" => "category_id DESC",
            );
            //GET DATA COMMENTS
            return $obj_category = $this->obj_category->search($params_category);
        }
}
