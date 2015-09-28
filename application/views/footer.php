        <section id="contato">
          <div class="container">
            <div class="row padding-h">
              <div class="col-xs-12 col-sm-4 fale-conosco">
                <h2 class="title title-greem">Fale Conosco</h2>
                <form>
                  <div class="col-xs-12 col-sm-6"><input type="text" placeholder="Nome" /></div>
                  <div class="col-xs-12 col-sm-6"><input type="email" placeholder="E-mail" /></div>
                  <div class="col-xs-12"><textarea name="mensagem" placeholder="Mensagem"></textarea></div>
                  <div class="col-xs-12"><input type="submit" enviar="Enviar" /></div>
                </form>
              </div>
              <div class="col-xs-12 col-sm-4 local-full">
                <img src="<?php echo $images_url ?>icon-local.png">
                <address>Rua C-178 nº366, Setor Nova Suíça<br>
                CEP 74270-080, Goiânia-GO<br>
                full@fullpropaganda.com.br</address>
              </div>
              <div class="col-xs-12 col-sm-4 seja-um-fullano">
                <h2 class="title title-greem">Seja um Fullano</h2>
                <div class="table">
                  <div class="icon table-cell"><img src="<?php echo $images_url ?>icon-usuario.png"></div>
                  <div class="form table-cell">
                    <form>
                      <div class="col-xs-12"><input type="email" placeholder="E-mail" ng-model="email" /></div>
                      <div class="col-xs-12"><input type="file" name="curriculo" ng-model="arquivo"></div>
                      <div class="col-xs-12"><input type="submit" enviar="Enviar" /></div>
                      --> {{email}}
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <section id="localizacao">
          Mapa
        </section>

        <div id="block-slider" class="{{slideClass}} hidden-md hidden-lg" ng-click="slideRight()" ng-swipe-left="slideRight()"></div>
      </section> <!-- #main-content -->
    </section> <!-- #main -->
    <script src="<?php echo $js_url ?>jquery-1.11.0.min.js" type="text/javascript"></script>
    <script src="<?php echo $js_url ?>angular.min.js" type="text/javascript"></script>
    <script src="<?php echo $js_url ?>angular-touch.min.js" type="text/javascript"></script>
    <script src="<?php echo $js_url ?>fullangular.js" type="text/javascript"></script>
    <script src="<?php echo $js_url ?>bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo $js_url ?>slick.min.js" type="text/javascript"></script>
    <script src="<?php echo $js_url ?>fullscripts.js" type="text/javascript"></script>
  </body>
</html>
