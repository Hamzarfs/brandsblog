<x-admin>
    @section('title', 'Edit Blog')

    @section('css')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>
        <link href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css"
            rel="stylesheet">

        {{-- Import Tinymce script --}}
        <script src="{{ asset('admin/plugins/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>

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
                        <h3 class="card-title">Edit Blog</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.blogs.index') }}" class="btn btn-sm btn-dark">Back</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('admin.blogs.update', $blog) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf @method('PUT')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title" class="form-label">Title <span
                                                class="text-danger fw-bold">*</span></label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                                            placeholder="Blog Title" name="title" id="title" required
                                            value="{{ old('title', $blog->title) }}">
                                        @error('title')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="content" class="form-label">Content <span
                                                class="text-danger fw-bold">*</span></label>
                                        <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content"
                                            placeholder="Blog content">{{ old('content', $blog->content) }}</textarea>
                                        @error('content')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="image" class="form-label">Image</label>
                                        <input type="file" class="form-control @error('image') is-invalid @enderror"
                                            name="image" id="image" accept="image/*">
                                        <small><a href="javascript:void(0)" class="view-image" data-toggle='modal'
                                                data-target='#view-image-modal' data-image="{{ $blog->image_url }}">View
                                                image</a></small>
                                        @error('image')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <div class="custom-control custom-switch custom-control-inline">
                                            <input type="checkbox" class="custom-control-input" id="is_archived"
                                                name="is_archived" value="1" @checked(old('is_archived', $blog->is_archived))>
                                            <label class="custom-control-label" for="is_archived">Archive ?</label>
                                            @error('is_archived')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="custom-control custom-switch custom-control-inline">
                                            <input type="checkbox" class="custom-control-input" id="is_featured"
                                                name="is_featured" value="1" @checked(old('is_featured', $blog->is_featured))>
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
                                            value="{{ old('slug', $blog->slug) }}">
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
                                                <option value="{{ $brand->id }}" @selected(old('brand', $blog->brand->id) == $brand->id)>
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
                                                <option value="{{ $category->id }}" @selected(old('category', $blog->category->id) == $category->id)>
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
                                        <select class="custom-select @error('tags') is-invalid @enderror"
                                            name="tags[]" id="tags" required multiple>
                                            <option value="">Select tags</option>
                                            @foreach ($tags as $tag)
                                                <option value="{{ $tag->id }}" @selected(in_array($tag->id, old('tags', array_column($blog->tags->toArray(), 'id'))))>
                                                    {{ $tag->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('tags.*')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="meta" class="form-label">SEO Tags <span
                                                class="text-danger fw-bold">*</span></label>
                                        <textarea name="meta_tags" id="meta" rows="5"
                                            class="form-control @error('meta_tags') is-invalid @enderror" required>{{ old('meta_tags', $blog->meta_tags) }} </textarea>
                                        @error('meta_tags')
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

        <!-- View Image Modal -->
        <div class="modal fade" id="view-image-modal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Blog Image</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img src="" alt="Blog Image" class="img-fluid d-block mx-auto">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
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

                tinymce.init({
                    selector: 'textarea#content',
                    menubar: false,
                    plugins: [
                        'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'link', 'lists',
                        'searchreplace', 'visualblocks', 'wordcount', 'code', 'image'
                    ],
                    toolbar: 'code | undo redo | blocks fontsize | bold italic underline strikethrough | image link | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
                    image_title: true,
                    automatic_uploads: true,
                    file_picker_types: 'image',
                    images_upload_url: "{{ route('admin.uploadBlogContentImage') }}",
                    image_prepend_url: "{{ url('storage') }}/",
                    relative_urls: false,
                    remove_script_host: false,
                    document_base_url: "{{ url('/') }}/",
                });
            })

            $('#view-image-modal').on('show.bs.modal', function() {
                $(this).find('.modal-body img').attr('src', $('.view-image').data('image'))
            })

            $('form').submit(function(event) {
                const content = tinymce.get('content').getContent({
                    format: 'text'
                }).trim();
                if (content === '') {
                    event.preventDefault();
                    alert('The content field is required.');
                    tinymce.get('content').focus();
                }
            })
        </script>
    @endsection
</x-admin>
