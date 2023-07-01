@extends('layout.main')
@section('css')
    <link rel="stylesheet" href="{{asset('css/upload.css')}}">
@endsection
@section('content')
    <div class="container my-4">

        <form method="POST" action="{{route('add.product.post')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <div class="custom_upload">
                            <div class="upload__box">
                                <div class="upload__btn-box">
                                  <label class="upload__btn">
                                    <div>Upload images</div>
                                    <input type="file" multiple name="images[]" data-max_length="20" class="upload__inputfile">
                                  </label>
                                </div>
                                <div class="upload__img-wrap"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                        placeholder="Product name" required minlength="5" maxlength="30">
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="mb-3">
                        <label for="start_price" class="form-label">Start Price (IDR)</label>
                        <input type="number" class="form-control" id="start_price" name="start_price"
                        placeholder="100000" required>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="mb-3">
                        <label for="adding_per_bid" class="form-label">Add Per Bid (IDR)</label>
                        <input type="number" class="form-control" id="adding_per_bid" name="adding_per_bid"
                        placeholder="10000" required>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="mb-3">
                        <label for="end_bid" class="form-label">End Bid (GMT +7)</label>
                        <input type="date" class="form-control" id="end_bid" name="end_bid"
                        placeholder="mm/dd/yyyy" required>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Great descriptions of your product" 
                        id="description" style="height: 100px" name="description"></textarea>
                        <label for="description">Descriptions</label>
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <button class="btn btn-outline-primary" type="submit">Create</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            ImgUpload();
        });

        function ImgUpload() {
        var imgWrap = "";
        var imgArray = [];

        $('.upload__inputfile').each(function () {
            $(this).on('change', function (e) {
            imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
            var maxLength = $(this).attr('data-max_length');

            var files = e.target.files;
            var filesArr = Array.prototype.slice.call(files);
            var iterator = 0;
            filesArr.forEach(function (f, index) {

                if (!f.type.match('image.*')) {
                return;
                }

                if (imgArray.length > maxLength) {
                return false
                } else {
                var len = 0;
                for (var i = 0; i < imgArray.length; i++) {
                    if (imgArray[i] !== undefined) {
                    len++;
                    }
                }
                if (len > maxLength) {
                    return false;
                } else {
                    imgArray.push(f);

                    var reader = new FileReader();
                    reader.onload = function (e) {
                    var html = "<div class='upload__img-box'><div style='background-image: url(" + e.target.result + ")' data-number='" + $(".upload__img-close").length + "' data-file='" + f.name + "' class='img-bg'><div class='upload__img-close'></div></div></div>";
                    imgWrap.append(html);
                    iterator++;
                    }
                    reader.readAsDataURL(f);
                }
                }
            });
            });
        });

        $('body').on('click', ".upload__img-close", function (e) {
            var file = $(this).parent().data("file");
            for (var i = 0; i < imgArray.length; i++) {
            if (imgArray[i].name === file) {
                imgArray.splice(i, 1);
                break;
            }
            }
            $(this).parent().parent().remove();
        });
    }
    </script>
@endsection