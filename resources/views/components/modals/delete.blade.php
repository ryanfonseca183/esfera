 @props(['name', 'route'])
 
 <div class="modal fade" id="delete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-body p-4 position-relative">
                <h2 class="h4"> <i class="bi bi-exclamation-circle-fill text-danger me-2"></i> Atenção</h2>
                <button type="button" class="btn-close position-absolute" style="top: 1.5rem; right: 1.5rem;" data-bs-dismiss="modal" aria-label="Close"></button>
                <p>Tem certeza que deseja deletar esse registro? A operação não é reversível</p>
                <form method="POST" action="{{ $route }}" class="mt-4 mb-0">
                    @csrf 
                    @method('DELETE')
                    <input type="hidden" name="{{$name}}">
                    <div class="float-end">
                        <button type="button" class="btn btn-oultine-secondary me-2" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-danger">Deletar</button>
                    </div>
                </form>
             </div>
         </div>
     </div>
 </div>

 @push('scripts')
    <script>
        $("#delete").on('show.bs.modal', function (e) {
            $("input[name={{ $name }}]").val(e.relatedTarget.getAttribute('data-reg-id'));
        })
    </script>
 @endpush