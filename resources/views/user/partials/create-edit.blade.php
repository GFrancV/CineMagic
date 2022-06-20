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
        </div>
        <br>
        <div class="row">
            <div class="col-sm-4">
                <label for="tipo_pagamento" class="form-label">Pagamento por omissão:</label>
                <select class="form-control" id="tipo_pagamento" name="tipo_pagamento"
                    value="{{ old('name', $cliente->tipo_pagamento) }}">
                    @if (is_null($cliente->tipo_pagamento))
                        <option value="">-- Selecione metodo de pagamento --</option>
                    @endif
                    <option value="VISA"
                        {{ old('tipo_pagamento', $cliente->tipo_pagamento) == 'VISA' ? 'selected' : '' }}>
                        VISA</option>
                    <option value="PAYPAL"
                        {{ old('tipo_pagamento', $cliente->tipo_pagamento) == 'PAYPAL' ? 'selected' : '' }}>
                        PAYPAL</option>
                    <option value="MBWAY"
                        {{ old('tipo_pagamento', $cliente->tipo_pagamento) == 'MBWAY' ? 'selected' : '' }}>
                        MBWAY</option>
                </select>
            </div>
            <div class="col-sm-8">
                <label for="ref_pagamento" class="form-label">Ref pagamento:</label>
                <input type="number" class="form-control" id="ref_pagamento" name="ref_pagamento"
                    value="{{ old('name', $cliente->ref_pagamento) }}">
            </div>
        </div>
    @endisset
    <br>
    <div class="form-group">
        <label for="inputFoto">Upload da foto</label>
        <input type="file" class="form-control-file" name="foto_url" id="inputFoto">
        @error('foto')
            <div class="small text-danger">{{ $message }}</div>
        @enderror
    </div>

</div>
</div>
