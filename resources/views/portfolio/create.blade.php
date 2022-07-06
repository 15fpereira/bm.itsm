<!-- Button trigger modal -->
<button type="button" class="btn btn-link" data-toggle="modal" data-target="#ModalPortfolioCreate"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Click aqui!</font></font></button>

<!-- Modal -->
<div class="modal fade" id="ModalPortfolioCreate" tabindex="-1" aria-labelledby="exModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel1">Deseja criar um novo portifólio? <i class="fa fa-exclamation-triangle"></i> </h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form -->
                <form method="post" action="{{route('portfolios.store')}}" class="form-horizontal">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="col-form-label col-form-label-lg" for="inputLarge"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tipo:</font></font></label>
                        <input class="form-control form-control-lg" type="text" placeholder=".form-control-lg" name="tipo" id="tipo" required>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label col-form-label-lg" for="inputLarge"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Objetivo:</font></font></label>
                        <textarea class="form-control form-control-lg" type="text" placeholder=".form-control-lg" name="objetivo" id="objetivo" required></textarea>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label col-form-label-lg" for="inputLarge"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Descrição:</font></font></label>
                        <textarea class="form-control form-control-lg" type="text" placeholder=".form-control-lg" name="descricao" id="descricao" required></textarea>
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                   <!-- Form <input type="hidden" name="_method" value="DELETE"> -->

                   <input type="hidden" name="status" value="ativo">
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

                    <button type="submit" class="btn btn-primary">Criar</button>
                </form>
                <!-- End Form -->
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
