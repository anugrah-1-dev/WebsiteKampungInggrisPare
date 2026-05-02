@extends('adminlte::page')

@section('title', 'Detail Galeri Erfan')

@section('content_header')
    <h1>Detail Galeri Erfan: {{ $galeri->title }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <h4>{{ $galeri->title }}</h4>
            <p>{{ $galeri->description ?? '-' }}</p>
            <p><strong>Tanggal Event:</strong> {{ $galeri->event_date ?? '-' }}</p>
            <p><strong>Status:</strong>
                <span class="badge {{ $galeri->status ? 'badge-success' : 'badge-secondary' }}">
                    {{ $galeri->status ? 'Aktif' : 'Nonaktif' }}
                </span>
            </p>
        </div>
    </div>

    <div class="row">
        @forelse ($galeri->images as $image)
            <div class="col-md-3 mb-4">
                <div class="card">
                    @if ($image->file_type === 'video')
                        <video class="card-img-top" controls style="max-height:200px;object-fit:cover;">
                            <source src="{{ asset('storage/' . $image->image_path) }}" type="video/mp4">
                        </video>
                        <div class="text-center py-1"><span class="badge badge-info"><i class="fas fa-video"></i> Video</span></div>
                    @else
                        <img src="{{ asset('storage/' . $image->image_path) }}" class="card-img-top" alt="Foto Galeri Erfan" style="max-height:200px;object-fit:cover;">
                    @endif
                    <div class="card-body">
                        <p class="text-muted small">{{ $image->caption ?? '-' }}</p>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-muted">Belum ada media.</p>
            </div>
        @endforelse
    </div>

    <a href="{{ route('admin.galeri-erfan.index') }}" class="btn btn-secondary">← Kembali</a>
@stop
