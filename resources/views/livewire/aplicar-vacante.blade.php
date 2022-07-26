<div class="bg-gray-100 p-5 mt-10 flex flex-col justify-center items-center">
  <h3 class="text-center text-2xl font-bold my-4">Aplicar a esta vacante</h3>

  <form class="w-96 mt-5" action="">
    <div class="mb-4">
        <x-label for="cv" :value="__('Curriculum')" />
        <x-input id="cv" type="file" accept=".pdf" class="block mt-1 w-full" />
    </div>
  </form>
</div>
