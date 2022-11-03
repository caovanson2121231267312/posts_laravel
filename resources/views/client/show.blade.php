@extends('client.layouts.app')

@section('title')
<title>
    {!! $data->title !!}
</title>
<meta name="description" content="" />
<meta name="keywords" content="">
<meta name="author" content="Codedthemes" />
@endsection

@section('body')
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.10/clipboard.min.js"></script>
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 col-xxl-8 my_post" id="my_post">
            {!! $data->content !!}
        </div>
        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
            
        </div>
        <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                CodeMirror
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
             
              <textarea id="codeMirrorHtml" class="p-3">
                <div class="info-box bg-gradient-info">
                  <span class="info-box-icon"><i class="far fa-bookmark"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Bookmarks</span>
                    <span class="info-box-number">41,410</span>
                    <div class="progress">
                      <div class="progress-bar" style="width: 70%"></div>
                    </div>
                    <span class="progress-description">
                      70% Increase in 30 Days
                    </span>
                  </div>
                </div>
              </textarea>
            </div>
            <div class="card-footer">
              Visit <a href="https://codemirror.net/">CodeMirror</a> documentation for more examples and information about the plugin.
            </div>
          </div>
        </div>

<!-- Trigger -->
<div class="btn copy" >
    click
</div> 
<p data-copy="1">123</p>

<div class="btn copy" >
    click
</div> 
<p data-copy="2">123 ---------------------</p>

<div class="btn copy" >
    click
</div>
<p data-copy="3">123 abcabca</p>

<div class="btn copy" >
    click
</div> 
<p data-copy="4">121233</p>

<a href="https://via.placeholder.com/1200/000000.png?text=2" data-toggle="lightbox" data-title="sample 2 - black">
                        <img src="https://via.placeholder.com/300/000000?text=2" class="img-fluid mb-2" alt="black sample">
                      </a>
        <!-- /.col-->
      </div>

    </div>
</div>
{{-- <link href="http://example.com/css/foonav.min.css" rel="stylesheet" />
<script src="http://example.com/js/foonav.min.js"></script> --}}

<script>


    var h2 = document.querySelectorAll("h2");
    h2.forEach(function (argument) {
        argument.setAttribute("id", ChangeToSlug(argument.innerHTML));
        console.log(argument.innerHTML)
        var h3 = document.querySelectorAll("h3");
        h3.forEach(function (index_h3) {
            index_h3.innerHTML.search('freetuts.net');
        })
    })
    console.log(h2.innerHTML);

    function ChangeToSlug(title)
    {
        var slug; 
     
        //Đổi chữ hoa thành chữ thường
        slug = title.toLowerCase();
     
        //Đổi ký tự có dấu thành không dấu
        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
        slug = slug.replace(/đ/gi, 'd');
        //Xóa các ký tự đặt biệt
        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
        //Đổi khoảng trắng thành ký tự gạch ngang
        slug = slug.replace(/ /gi, "-");
        //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
        //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
        slug = slug.replace(/\-\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-/gi, '-');
        slug = slug.replace(/\-\-/gi, '-');
        //Xóa các ký tự gạch ngang ở đầu và cuối
        slug = '@' + slug + '@';
        slug = slug.replace(/\@\-|\-\@|\@/gi, '');
        //In slug ra textbox có id “slug”
        return slug;
    }


</script>
@endsection