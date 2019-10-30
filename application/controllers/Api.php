<?php

ob_start();
require APPPATH . '/libraries/REST_Controller.php';
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends REST_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('api/Api_model', 'A');
    }

    /*     * ************* START API FUNCTIONS ************** */

    function get_book_list_get() {
        $start = ($this->get('page') > 0) ? $this->get('page') * PER_PAGE_RECORD : 0;
        $result['book_list_count'] = $this->A->getBookListCount($this->get());
        $result['book_list'] = $this->A->getBookList($start, $this->get());
        $last_page = (($this->get('page') > 0) && $result['book_list_count'] - (($this->get('page') + 1) * PER_PAGE_RECORD) > 0) ? FALSE : TRUE;
        $next_offset = ($last_page) ? FALSE : $this->get('page') + 1;
        $this->response(array("status" => "success", "total_book_count" => $result['book_list_count'], 'next_offset' => $next_offset, "result" => $result['book_list']), 200);
    }

}
