<form class="md:w-1/2 space-y-5">
    <div>
      <x-label for="titulo" :value="__('Título vacante')" />

      <x-input 
        id="titulo"
        class="block mt-1 w-full" 
        type="text"
        name="titulo"
        :value="old('titulo')"
        placeholder="Titulo vacante" 
      />
    </div>
    
    <div>
      
      <x-label for="salario" :value="__('Salario mensual')" />
      <select 
        id="salario"
        name="salario"
        class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
        <option>-- Seleccione --</option>
        @foreach ($salarios as $salario)
          <option value="{{ $salario->id }}">{{ $salario->salario }}</option>
        @endforeach

      </select>
      
      
    </div>

    <div>
      
        <x-label for="categoria" :value="__('Categoría')" />
        <select 
          id="categoria"
          name="categoria"
          class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
        
        <option>-- Seleccione --</option>
        @foreach ($categorias as $categoria)
          <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
        @endforeach
      </select>
      </div>

      <div>
        <x-label for="empresa" :value="__('Empresa')" />
  
        <x-input 
          id="empresa"
          class="block mt-1 w-full" 
          type="text"
          name="empresa"
          :value="old('empresa')"
          placeholder="Empresa: ej. Netflix, Uber, Shopify" 
        />
      </div>
  
      <div>
        <x-label for="ultimo_dia" :value="__('Último día para postularse')" />
  
        <x-input 
          id="ultimo_dia"
          class="block mt-1 w-full" 
          type="date"
          name="empresa"
          :value="old('ultimo_dia')"
        />
      </div>

      <div>
        <x-label for="ultimo_dia" :value="__('Descripción Puesto')" />
  
        <textarea 
          name="descripcion"
          placeholder="Descripción general del puesto, experiencia" 
          class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full h-72">
        </textarea>
      </div>


      <div>
        <x-label for="imagen" :value="__('Imagen')" />
  
        <x-input 
          id="imagen"
          class="block mt-1 w-full" 
          type="file"
          name="imagen"
        />
      </div>

      <x-button>
        Crear vacante
      </x-button>
      
  

</form>
