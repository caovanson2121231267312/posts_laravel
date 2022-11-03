<?php

namespace App\Components;

use App\Models\category;

class Cate
{
    private $htmlSlelect = '';
    private $data;
    public function __construct($data)
    {
        $this->htmlSlelect = '';
        $this->data = $data;
    }
    function cate($parent_id, $id = 0, $gt = '')
    {
        foreach ($this->data as $value) {
            if ($value['parent_id'] == $id) {
                if (!empty($parent_id) && $parent_id == $value['id']) {
                    $this->htmlSlelect .= "<option selected value='" . $value['id'] . "'>" . $gt . $value['name'] . "</option>";
                } else {
                    $this->htmlSlelect .= "<option value='" . $value['id'] . "'>" . $gt . $value['name'] . "</option>";
                }
                $this->cate($parent_id, $value['id'], $gt . '=');
            }
        }
        return $this->htmlSlelect;
    }
    function menu($parent_id, $id = 0, $gt = '')
    {
        foreach ($this->data as $value) {
            if ($value['parent_id'] == $id) {
                if (!empty($parent_id) && $parent_id == $value['id']) {
                    $this->htmlSlelect .= "<option selected value='" . $value['id'] . "'>" . $gt . $value['name'] . "</option>";
                } else {
                    $this->htmlSlelect .= "<option value='" . $value['id'] . "'>" . $gt . $value['name'] . "</option>";
                }
                $this->cate($value['id'], $gt . '=');
            }
        }
        return $this->htmlSlelect;
    }
    function showCategories($categories, $parent_id = 0, $char = '')
    {
        // BƯỚC 2.1: LẤY DANH SÁCH CATE CON
        $cate_child = array();
        foreach ($categories as $key => $item) {
            // Nếu là chuyên mục con thì hiển thị
            if ($item['parent_id'] == $parent_id) {
                $cate_child[] = $item;
                unset($categories[$key]);
            }
        }

        // BƯỚC 2.2: HIỂN THỊ DANH SÁCH CHUYÊN MỤC CON NẾU CÓ
        if ($cate_child) {
            $this->htmlSlelect .= '<ul>';
            foreach ($cate_child as $key => $item) {
                // Hiển thị tiêu đề chuyên mục
                $this->htmlSlelect .= '<li>' . $item['name'];

                // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
                $this->showCategories($categories, $item['id'], $char . '|---');
                $this->htmlSlelect .= '</li>';
            }
            $this->htmlSlelect .= '</ul>';
        }
    }
    function showindex($categories, $parent_id = 0, $char = '')
    {
        // BƯỚC 2.1: LẤY DANH SÁCH CATE CON
        $cate_child = array();
        foreach ($categories as $key => $item) {
            // Nếu là chuyên mục con thì hiển thị
            if ($item['parent_id'] == $parent_id) {
                $cate_child[] = $item;
                unset($categories[$key]);
            }
        }
        // BƯỚC 2.2: HIỂN THỊ DANH SÁCH CHUYÊN MỤC CON NẾU CÓ
        if ($cate_child) {
            $this->htmlSlelect .= "
            <div class='slidebar-index'>
            <ul class='slidebar__list'>";

            foreach ($cate_child as $key => $item) {
                // Hiển thị tiêu đề chuyên mục
                $this->htmlSlelect .= "
                    <li class='slidebar-li'>
                        <a href='";
                        if($item['parent_id']==0){
                            $this->htmlSlelect .="#' >";
                        }else{
                            $this->htmlSlelect .=route('/p',['id'=>$item['file']])."' >";
                        }
                            $this->htmlSlelect .="
                            <p>";
                $this->htmlSlelect .= $item['name'];

                // $this->htmlSlelect .= '<li>';
                    $this->showindex($categories, $item['id'], $char . '|---');

                $this->htmlSlelect .= '</p>
                                    </a>
                                    </li>';

            }
            $this->htmlSlelect .= '</ul></div>';
        }
        return $this->htmlSlelect;
    }
}
