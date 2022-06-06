@extends('user.index')

@section('user_info')
    <form>
        @include('user.partials.create-edit')
        <div class="form-group">
            <img src="{{ $user->foto_url ? asset('storage/fotos/' . $user->foto_url) : asset('images/default_img.png') }}"
                alt="Foto do user" class="img-profile" style="max-width:100%" height="250px">
        </div>
        <div class="form-group text-right">
            @isset($user->foto_url)
                @can('update', $user)
                    <button type="submit" class="btn btn-danger" name="deletefoto" form="form_delete_photo">Apagar Foto</button>
                @endcan
            @endisset
            <button type="submit" class="btn btn-primary" name="ok">Save</button>
            <a href="" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
@endsection
