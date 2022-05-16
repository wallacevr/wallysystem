<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="row">
         <div class="col">

             <select name="clientes" id="clientes"  wire:model="cliente_id" class="form-control">

                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}">{{ $cliente->name }}</option>

                    @endforeach
             </select>
         </div>
    </div>
</div>
