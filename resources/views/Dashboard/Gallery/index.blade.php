@extends('layouts.dashboard')

@section('breadcrumbs')
    @parent
    <li class="breadcrumb-item active"><a href="{{ route('gallery.index') }}">Gallery</a></li>
@endsection

@section('content')
    <div class="container">
        <h1 class="mb-4">Gallery</h1>

        @foreach($activities as $activity)
            <div class="mb-5">
                <h3>{{ $activity->title }}</h3>
                <p class="text-muted">{{ $activity->description }}</p>

                <!-- زر إضافة صورة جديدة -->
                <div class="mb-3 text-end">
                    <a href="{{ route('gallery.create') }}" class="btn btn-success">+ Add Photos</a>
                </div>

                <div class="row">
                    @if($activity->gallery->isEmpty())
                        <p class="text-center text-muted">No images found for this activity.</p>
                    @else
                        @foreach ($activity->gallery as $gallery)
                            <div class="col-md-4 mb-4">
                                <div class="card shadow-sm h-100">
                                    <!-- الصورة -->
                                    <img src="{{ asset('storage/' . $gallery->media_url) }}"
                                         class="card-img-top img-fluid preview-image"
                                         style="height: 200px; object-fit: cover; cursor: pointer;"
                                         alt="Gallery Image"
                                         data-bs-toggle="modal"
                                         data-bs-target="#imageModal"
                                         data-img-src="{{ asset('storage/' . $gallery->media_url) }}">

                                    <div class="card-body">
                                        <p class="small text-muted">Activity ID: {{ $gallery->activity_id }}</p>

                                        <!-- زر الحذف -->
                                        <div class="d-flex justify-content-between">
                                            <form action="{{ route('gallery.destroy', $gallery->id) }}" method="POST" class="delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm delete-btn">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        @endforeach
    </div>

    <!-- Modal لعرض الصورة بشكل كبير -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <img id="modalImage" src="" class="img-fluid w-100">
                </div>
                <div class="modal-footer">
                    <a id="downloadImageBtn" href="#" download class="btn btn-primary">
                        Download Image
                    </a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- سكريبت لجلب الصورة إلى المودال وتحسين حذف الصور -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const modalImage = document.getElementById("modalImage");
            const downloadBtn = document.getElementById("downloadImageBtn");

            // تحديث الصورة عند النقر على أي صورة في المعرض
            document.querySelectorAll(".preview-image").forEach(image => {
                image.addEventListener("click", function () {
                    const imgSrc = this.getAttribute("data-img-src");
                    modalImage.src = imgSrc;
                    // تحديث رابط زر التحميل ليقوم بتحميل الصورة المعروضة
                    downloadBtn.href = imgSrc;

                    // تعيين اسم الصورة عند التحميل
                    const fileName = imgSrc.split('/').pop(); // استخراج اسم الملف من الرابط
                    downloadBtn.setAttribute("download", fileName);
                });
            });

            // تحسين عملية تأكيد الحذف
            document.querySelectorAll('.delete-form').forEach(form => {
                form.addEventListener('submit', function (event) {
                    if (!confirm('Are you sure you want to delete this image?')) {
                        event.preventDefault();
                    }
                });
            });
        });
    </script>



    @push('styles')
        <style>

        #modalImage {
        max-width: 100%;
        height: auto;
        cursor: zoom-in;
        transition: transform 0.3s ease-in-out;
        }

        #modalImage:hover {
        transform: scale(1.2);
        cursor: zoom-out;
        }
        </style>

    @endpush
@endsection
