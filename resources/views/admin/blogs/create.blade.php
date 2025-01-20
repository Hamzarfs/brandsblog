<x-admin>
    @section('title', 'Create Blog')

    @section('css')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>
        <link href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@1.5.2/dist/select2-bootstrap4.min.css"
            rel="stylesheet">
        {{-- <link href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css"
            rel="stylesheet"> --}}


        <style>
            .select2-container--bootstrap4 .select2-selection__clear {
                margin-right: 25px;
                background-color: red !important;
                padding-left: 0.25em;
            }
        </style>
    @endsection

    <section class="content">
        <!-- Default box -->
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create New Blog</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.blogs.index') }}" class="btn btn-sm btn-dark">Back</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title" class="form-label">Title <span
                                                class="text-danger fw-bold">*</span></label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                                            placeholder="Blog Title" name="title" id="title" required
                                            value="{{ old('title') }}">
                                        @error('title')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="content" class="form-label">Content <span
                                                class="text-danger fw-bold">*</span></label>
                                        <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" required
                                            placeholder="Blog content" rows="5">{{ old('content') }}</textarea>
                                        @error('content')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="image" class="form-label">Image <span
                                                class="text-danger fw-bold">*</span></label>
                                        <input type="file" class="form-control @error('image') is-invalid @enderror"
                                            name="image" id="image" accept="image/*" required>
                                        @error('image')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <div class="custom-control custom-switch custom-control-inline">
                                            <input type="checkbox" class="custom-control-input" id="is_archived"
                                                name="is_archived" value="1">
                                            <label class="custom-control-label" for="is_archived">Archive ?</label>
                                            @error('is_archived')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="custom-control custom-switch custom-control-inline">
                                            <input type="checkbox" class="custom-control-input" id="is_featured"
                                                name="is_featured" value="1">
                                            <label class="custom-control-label" for="is_featured">Featured ?</label>
                                            @error('is_featured')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="slug" class="form-label">Slug</label>
                                        <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                            placeholder="Blog slug" name="slug" id="slug"
                                            value="{{ old('slug') }}">
                                        @error('slug')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="brand" class="form-label">Brand <span
                                                class="text-danger fw-bold">*</span></label>
                                        <select class="custom-select @error('brand') is-invalid @enderror"
                                            name="brand" id="brand" required>
                                            <option value="">Select a brand</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}" @selected(old('brand') == $brand->id)>
                                                    {{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('brand')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="category" class="form-label">Category <span
                                                class="text-danger fw-bold">*</span></label>
                                        <select class="custom-select @error('category') is-invalid @enderror"
                                            name="category" id="category" required>
                                            <option value="">Select a category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" @selected(old('category') == $category->id)>
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="tags" class="form-label">Tags <span
                                                class="text-danger fw-bold">*</span></label>
                                        <select class="custom-select @error('tags') is-invalid @enderror" name="tags[]"
                                            id="tags" required multiple>
                                            <option value="">Select tags</option>
                                            @foreach ($tags as $tag)
                                                <option value="{{ $tag->id }}" @selected(in_array($tag->id, old('tags', [])))>
                                                    {{ $tag->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('tags.*')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer float-end float-right">
                            <button type="submit" id="submit"
                                class="btn btn-primary float-end float-right">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.card -->

    </section>


    @section('js')
        <script>
            $(function() {
                $('#brand').select2({
                    theme: 'bootstrap4',
                    placeholder: 'Select brand',
                    allowClear: true
                })
                $('#category').select2({
                    theme: 'bootstrap4',
                    placeholder: 'Select category',
                    allowClear: true
                })
                $('#tags').select2({
                    theme: 'bootstrap4',
                    placeholder: 'Select tags',
                    allowClear: true
                })
            });
        </script>
    @endsection
</x-admin>
