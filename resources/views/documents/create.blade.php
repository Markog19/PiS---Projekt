@extends('layouts.app')

@section('content')


    <div class="container-fluid gedf-wrapper">
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6 gedf-main">

                <!--- \\\\\\\Post-->
                <div class="card gedf-card">
                    <form class="form-horizontal" method="POST" action="{{ route('documents.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="posts-tab" data-toggle="tab" href="#posts" role="tab" aria-controls="posts" aria-selected="true">Prenesi novi dokument</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="posts" role="tabpanel" aria-labelledby="posts-tab">

                                    <div class="form-group">
                                        <input id="user_name" type="text" value="{{ Auth::user()->name}}" class="form-control" name="user_name" placeholder="Vaše ime" required  autofocus>
                                    </div>

                                    <div class="form-group">

                                        <input id="doc_name" type="text" class="form-control" name="doc_name" placeholder="Naslov dokumenta" required  autofocus>
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Dokument</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="doc_file" name="doc_file" required onchange="javascript:updateList()">

                                            <label class="custom-file-label" for="doc_file">doc | docx | pdf | txt | xlsx | csv | pptx | ppt</label>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            Odabrani dokument:
                                        </div>
                                        <div class="col-7" id="fileList">još niste odabrali dokument</div>
                                    </div>
                                    <br>

                                    <div class="form-group">
                                        <select name="category_id" id="category_id" class="form-control">
                                            <option disabled  selected value="">Odaberite kategoriju...</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>

                            </div>
                            <div class="btn-toolbar justify-content-between">


                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
                <!-- Post /////-->

            </div>

        </div>
    </div>

    <script>
        updateList = function() {

            var input = document.getElementById('doc_file');
            var output = document.getElementById('fileList');

            for (var i = 0; i < input.files.length; ++i) {
                output.innerHTML = input.files.item(i).name;
            }

        }
    </script>

@endsection

