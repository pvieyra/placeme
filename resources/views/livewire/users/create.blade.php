<div>
  <div class="row">
      <div class="card hoverable">
        <div class="card-content">
          <span class="card-title">Creación de usuarios</span><br>
          <div class="row">
            <form class="col s12">
              <div class="row">
                <div class="input-field col s12 m6 l4">
                  <input  id="name" type="text" class="validate">
                  <label for="name">Nombre(s)</label>
                </div>
                <div class="input-field col s12 m6 l4">
                  <input id="last_name"  type="text" class="validate">
                  <label for="last_name">Apellido Paterno</label>
                </div>
                <div class="input-field col s12 m12 l4">
                  <input id="second_lastname"  type="text" class="validate">
                  <label for="second_lastname">Apellido Materno</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <input id="email" type="email" class="validate">
                  <label for="email">Correo Eléctronico</label>
                </div>
                <div class="input-field col s12">
                  <input id="password" type="password" class="validate">
                  <label for="password">Contraseña</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <input id="phone" type="text" class="validate">
                  <label for="phone">Teléfono</label>
                </div>
              </div>
              <div class="row">
                <div class="col s12 m6">
                  <p class="p-v-xs">
                    <input name="role" class="orange" type="radio" id="admin-role" />
                    <label for="admin-role">Administrador</label>
                  </p>
                  <p class="p-v-xs">
                    <input name="role" type="radio" id="asesor-role" />
                    <label for="asesor-role">Asesor</label>
                  </p>
                </div>
                <div class="col s12 m6">
                  <div class="file-field input-field">
                    <div class="btn after:bg-orange-500 lighten-1">
                      <span>Foto</span>
                      <input type="file" >
                    </div>
                    <div class="file-path-wrapper">
                      <input class="file-path validate" type="text" placeholder="Imagen de perfil">
                    </div>
                  </div>
                </div>
              </div>
              <div class="flex mt-15">
                <div>
                  <a class="waves-effect waves-light btn m-b-xs orange"><i class="material-icons left">save</i>Crear</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
