                       <!-- Start Contact Form -->
                        <form class="contact-form" id="contact-form" role="form" method="post" action="{{route('chamados.update', $chamado->id)}}">
                            {{ csrf_field() }}

                                <input type="hidden" name="_method" value="put">

                                <div class="form-group">
                                    <label for="exampleTextarea" class="form-label mt-4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Descrição:</font></font></label>
                                    <textarea class="form-control" id="descricao" name="descricao" value="{{$chamado->descricao}}" placeholder="{{$chamado->descricao}}" rows="3"></textarea>
                                </div>


                                <legend class="mt-4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Status do chamado:</font></font></legend>
                                <div class="form-check">
                                    <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="status" id="optionsRadios1" value="Aberto" checked=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                    Aberto:
                                    </font></font></label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="status" id="optionsRadios2" value="Em andamento"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                    Em andamento:
                                    </font></font></label>
                                </div>
                                <div class="form-check disabled">
                                    <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="status" id="optionsRadios3" value="" disabled="Concluido"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                    Concluido:
                                    </font></font></label>
                                </div>

                        <button type="submit" class="btn btn-secondary btn-sm mt-4">Confirmar</button>

                    </form>
                    <!-- End Contact Form -->






