<div class="form-group">
    <div class="row">
        <div class="col-sm-8">
            <label for="name" class="form-label">Nome usuario:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}"
                required>
        </div>
        @isset($cliente)
            <div class="col-sm-4">
                <label for="nif" class="form-label">NIF:</label>
                <input type="number" class="form-control" id="nif" name="nif"
                    value="{{ old('name', $cliente->nif) }}">
            </div>
            <label for="nif" class="form-label">Pagamento por omissão:</label>
            <input type="text" class="form-control" id="nif" name="nif"
                value="{{ old('name', $cliente->tipo_pagamento) }}">
        @endisset
        <div class="form-group">
            <label for="inputFoto">Upload da foto</label>
            <input type="file" class="form-control-file" name="foto_url" id="inputFoto">
            @error('foto')
                <div class="small text-danger">{{ $message }}</div>
            @enderror
        </div>

    </div>
</div>
