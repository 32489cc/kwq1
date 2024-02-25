
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>投稿フォーム</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/modal.css') }}" rel="stylesheet">
    <style>
        ._hidden{
            display: none;
        }
        .required-field {
            color: red;
        }
        .main-container {
            display: flex;
            justify-content: space-between;
            border: 1px solid #000; /* Add border around the main container */
            margin: 20px; /* Add some margin around the main container */
        }

        .left-container {
            width: 50%;
            background-color: #add8e6; /* Light blue background color */
            padding: 20px; /* Add padding to the content */
        }

        .right-container {
            width: 50%;
            border-left: 1px solid #000; /* Add border between the left and right containers */
            padding: 20px; /* Add padding to the content */
        }

        .search-box, .checkbox-container, .delete-container {
            margin-bottom: 20px;
        }

        #searchResults {
            position: absolute; /* Positioned relative to the search-box */
            width: 100%; /* Match the width of the search input */
            background: white;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2); /* Optional: Adds a shadow for depth */
            z-index: 1000; /* Ensures the dropdown is on top of other content */
            max-height: 300px; /* Limit the maximum height */
            overflow-y: auto; /* Adds scroll if the content overflows */
        }

        #searchResults li {
            padding: 10px; /* Add padding for each result for better readability */
            border-bottom: 1px solid #ddd; /* Add a border between each result */
            cursor: pointer; /* Change cursor to pointer to indicate it's clickable */
        }

        #searchResults li:last-child {
            border-bottom: none; /* Remove bottom border for the last item */
        }

        #searchResults li:hover {
            background-color: #f8f8f8; /* Highlight item on hover */
        }


    </style>
</head>
<body>

<div class="container mt-4">
    <h2>投稿フォーム</h2>
    <form>
        <div class="form-row align-items-center mb-3">
            <div class="col-auto">
                <label for="submitter">投稿者 <span class="required-field">*</span></label>
            </div>
            <div class="col">
                <input type="text" class="form-control mb-2" id="department" placeholder="所属部门">
            </div>
            <div class="col">
                <input type="text" class="form-control mb-2" id="name" placeholder="姓名">
            </div>
        </div>
        <div class="form-row align-items-center mb-3">
            <div class="col-auto">
                <label for="categorySelect">分类<span class="required-field">*</span></label>
            </div>
            <div class="col">
                <select class="form-control" id="categorySelect">
                    <option selected>选择分类...</option>
                    <option value="1">分类1</option>
                    <option value="2">分类2</option>
                    <!-- More options here -->
                </select>
            </div>
        </div>
        <div class="form-row align-items-center mb-3">
            <div class="col-auto">
                <label for="title">标题<span class="required-field">*</span></label>
            </div>
            <div class="col">
                <input type="text" class="form-control" id="title" placeholder="标题">
            </div>
        </div>
        <div class="form-row align-items-center mb-3">
            <div class="col-auto">
                <label for="content">本文</label>
            </div>
            <div class="col">
                <textarea class="form-control" id="content" rows="3" placeholder="本文"></textarea>
            </div>
        </div>
        <div class="form-row align-items-center mb-3">
            <div class="col-auto">
                <label for="fileUpload">文件上传</label>
            </div>
            <div class="col">
                <input type="file" class="form-control-file" id="fileUpload">
            </div>
        </div>
        <div class="form-row">
            <div class="col-12">
                <div class="main-container">
                    <div class="col-2 left-container">
                        <h2>掲載大学</h2>
                    </div>
                    <div class="col-10 right-container">
                        <div class="search-box">
                            <!-- Put your search bar here -->
                            <input type="text" placeholder="Search..." class="form-control input" data-university-search-suggest="true"/>
{{--                            <ul id="searchResults" class="list-group" style="display: none;">--}}
{{--                                <!-- Search results will be populated here -->--}}
{{--                                <!-- Example: -->--}}
{{--                                <!-- <li class="list-group-item">Result 1</li> -->--}}
{{--                            </ul>--}}
                        </div>
                        <div class="checkbox-container">
                            <!-- Put your checkboxes here -->
{{--                            <input type="checkbox" id="uni1" name="uni1" />--}}
{{--                            <label for="uni1">University 1</label><br />--}}
{{--                            <input type="checkbox" id="uni2" name="uni2" />--}}
{{--                            <label for="uni2">University 2</label><br />--}}
                            <!-- Add more as needed -->
                        </div>
                        <div class="delete-container">
                            <!-- Button to delete selected universities -->
                            <button class="btn btn-danger">Delete Selected</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="form-row align-items-center justify-content-end">
            <div class="col-auto">
                <button type="button" class="btn btn-secondary" data-micromodal-trigger="clear-modal">取消</button>
            </div>
            <div class="col-auto">
                <button type="button" class="btn btn-primary" data-micromodal-trigger="post-modal">发送</button>
            </div>
        </div>
    </form>
</div>
<div class="modal micromodal-slide" id="clear-modal" aria-hidden="true">
    <div class="modal__overlay" tabindex="-1" data-micromodal-close>
        <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
            <header class="modal__header">
                <h2 class="modal__title" id="modal-1-title">
                    クリア
                </h2>
                <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
            </header>
            <main class="modal__content" id="modal-1-content">
                <p>
                    Try hitting the <code>tab</code> key and notice how the focus stays within the modal itself. Also, <code>esc</code> to close modal.
                </p>
            </main>
            <footer class="modal__footer">
                <button class="modal__btn modal__btn-primary">Continue</button>
                <button class="modal__btn" data-micromodal-close aria-label="Close this dialog window">Close</button>
            </footer>
        </div>
    </div>
</div>
<div class="modal micromodal-slide" id="post-modal" aria-hidden="true">
    <div class="modal__overlay" tabindex="-1" data-micromodal-close>
        <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
            <header class="modal__header">
                <h2 class="modal__title" id="modal-1-title">
                    投稿
                </h2>
                <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
            </header>
            <main class="modal__content" id="modal-1-content">
                <p>
                    Try hitting the <code>tab</code> key and notice how the focus stays within the modal itself. Also, <code>esc</code> to close modal.
                </p>
            </main>
            <footer class="modal__footer">
                <button class="modal__btn modal__btn-primary">Continue</button>
                <button class="modal__btn" data-micromodal-close aria-label="Close this dialog window">Close</button>
            </footer>
        </div>
    </div>
</div>

<script src="https://cdn.staticfile.org/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.9.9/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/micromodal/dist/micromodal.min.js"></script>
<script src="{{'/js/bbs/bbs_function.js'}}"></script>
<script>
    MicroModal.init();
</script>
</body>
</html>

