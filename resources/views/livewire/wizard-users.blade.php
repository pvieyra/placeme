<div>
  <div class="row">
    <div class="col s12">
      <div class="page-title">Crear Usuarios</div>
    </div>
    <div class="col s12 m12 l12">
      <div class="card">
        <div class="card-content">
          <form id="example-form" action="#">
            <div>
              <h3>Personal Info</h3>
              <section>
                <div class="wizard-content">
                  <div class="row">
                    <div class="col m6">
                      <div class="row">
                        <div class="input-field col m6 s12">
                          <label for="firstName">Nombre</label>
                          <input id="firstName" name="firstName" type="text" class="required validate">
                        </div>
                        <div class="input-field col m6 s12">
                          <label for="lastName">Last name</label>
                          <input id="lastName" name="lastName" type="text" class="required validate">
                        </div>
                        <div class="input-field col s12">
                          <label for="email">Email</label>
                          <input id="email" name="email" type="email" class="required validate">
                        </div>
                        <div class="input-field col s12">
                          <label for="password">Password</label>
                          <input id="password" name="password" type="password" class="required validate">
                        </div>
                        <div class="input-field col s12">
                          <label for="confirm">Confirm password</label>
                          <input id="confirm" name="confirm" type="password" class="required validate">
                        </div>
                      </div>
                    </div>
                    <div class="col m6">
                      <div class="row">
                        <div class="input-field col m6 s12">
                          <select id="countrySelect">
                            <option value="">Country...</option>
                            <option value="AF">Afghanistan</option>
                            <option value="AL">Albania</option>
                            <option value="DZ">Algeria</option>
                            <option value="AS">American Samoa</option>
                            <option value="AD">Andorra</option>
                            <option value="AG">Angola</option>
                            <option value="BA">Bosnia &amp; Herzegovina</option>
                            <option value="BW">Botswana</option>
                            <option value="BR">Brazil</option>
                            <option value="BC">British Indian Ocean Ter</option>
                            <option value="BN">Brunei</option>
                            <option value="BG">Bulgaria</option>
                            <option value="BF">Burkina Faso</option>
                            <option value="ZR">Zaire</option>
                            <option value="ZM">Zambia</option>
                            <option value="ZW">Zimbabwe</option>
                          </select>
                        </div>
                        <div class="input-field col m6 s12">
                          <label for="address">Address</label>
                          <input id="address" name="address" type="text">
                        </div>
                        <div class="input-field col m6 s12">
                          <label for="birthdate">Birthdate</label>
                          <input id="birthdate" name="birthdate" type="date" class="datepicker required">
                        </div>
                        <div class="input-field col m6 s12">
                          <label for="city">City/Town</label>
                          <input id="city" name="city" type="text">
                        </div>
                        <div class="input-field col s12">
                          <label for="phone">Phone number</label>
                          <input id="phone" name="phone" type="tel" class="required validate">
                        </div>
                        <div class="input-field col s12">
                          <div class="switch m-b-md">
                            <label>
                              <input type="checkbox">
                              <span class="lever"></span>
                              Get news and updates from Alpha
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
              <h3>Product Info</h3>
              <section>
                <div class="wizard-content">
                  <div class="row">
                    <div class="col m3 s12 center-align">
                      <img src="{{ asset('images/wizard-image.png')}}" class="m-b-lg" alt="">
                      <p class="grey-text center-align">Steelcoders ©</p>
                    </div>
                    <div class="col m9 s12">
                      <h5><b>Alpha - Responsive Admin Dashboard Template</b></h5>
                      <div class="row m-t-lg">
                        <div class="col m6">
                          <p class="no-p">Features:</p>
                          <ul>
                            <li><b>Layout:</b> Responsive</li>
                            <li><b>Framework:</b> MaterializeCSS</li>
                            <li><b>Compatible Browsers:</b> IE9, IE10, IE11, Firefox, Safari, Opera, Chrome</li>
                            <li><b>Documentation:</b> Well Documented</li>
                          </ul>
                        </div>
                        <div class="col m6">
                          <div class="input-field col m12 s12">
                            <select id="licenseSelect" class="required validate">
                              <option value="rl">Regular License</option>
                              <option value="el">Extended License</option>
                            </select>
                          </div>
                          <div class="input-field col m12 s12">
                            <label for="quantity">Quantity</label>
                            <input id="quantity" name="quantity" type="number" class="required validate">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
              <h3>Privacy &amp; Terms</h3>
              <section>
                <div class="wizard-content">
                  <div class="wizardTerms">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vel risus elit. Nunc tempor velit dui, sed gravida urna posuere in. Cras sollicitudin urna at sapien vestibulum commodo quis eget tellus. Nam dapibus fringilla nulla, ac interdum velit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Phasellus at enim lectus. Phasellus commodo, massa vel congue fermentum, ligula erat egestas turpis, at tempor tellus nulla at nunc. Proin in ornare diam. Proin egestas sodales dolor at rutrum. Suspendisse eu ipsum feugiat, sollicitudin mi eu, tincidunt nibh. Etiam et orci nulla. Sed condimentum orci vel maximus egestas.<br><br>Donec malesuada urna sed orci venenatis ultricies nec eu enim. Vestibulum accumsan iaculis ligula, ac semper risus feugiat ut. Suspendisse tincidunt iaculis ante at eleifend. Maecenas ac nulla varius, vehicula tellus vitae, placerat ipsum. Suspendisse nunc nibh, efficitur non mollis in, pulvinar volutpat metus. Nulla sit amet tortor vestibulum, porttitor dui sed, porta ex. Mauris at justo in sapien semper efficitur quis eget orci. Donec pellentesque leo sit amet dui pharetra condimentum. Nullam eleifend tempor augue, non rutrum nibh tristique non. Nullam eget pellentesque nisi. Aenean nibh ipsum, suscipit id imperdiet vitae, sodales et lacus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed at ex turpis. Donec tempor molestie leo eget rutrum. Suspendisse quis nunc a nibh luctus cursus. Fusce vel varius nibh.<br><br>Duis dapibus consequat iaculis. Maecenas fringilla velit ligula, non mattis enim vehicula ut. Suspendisse ipsum ante, pellentesque quis auctor eu, ullamcorper ac ligula. Morbi laoreet consectetur leo. Nam lacus felis, feugiat eget felis eget, lobortis dictum justo. Aenean congue magna at eros rutrum, ut volutpat risus porta. Vivamus arcu lectus, accumsan sit amet mauris ut, tristique sollicitudin sapien. Sed pulvinar feugiat justo, eu mattis sem consequat blandit. Duis blandit purus sit amet sem ornare accumsan. Donec ullamcorper ante enim, sed pretium odio ultricies ac. Duis nec sapien efficitur, faucibus erat ut, bibendum diam. Cras tempus mattis sapien eu feugiat. Aenean risus dui, semper eget velit in, ultrices convallis velit. Morbi a velit dictum, egestas orci eu, venenatis felis. Sed feugiat eros eget orci semper finibus.<br><br>Vivamus in metus lobortis, bibendum mauris dignissim, dapibus justo. Nunc tempor lacus dolor, nec venenatis neque scelerisque sed. Fusce quis est ac erat condimentum posuere. Pellentesque eleifend mauris dui, eu volutpat elit commodo id. Donec faucibus, enim nec luctus elementum, orci justo faucibus dui, ut porttitor lectus neque id leo. Proin viverra diam lacus, rutrum feugiat eros tempor eu. Sed et lorem eu lectus interdum aliquet. In pretium luctus arcu ut pellentesque. Nam faucibus posuere leo, in vehicula mauris vestibulum non.<br><br>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aliquam fringilla efficitur sapien at volutpat. Vivamus nec enim est. Quisque sit amet ex non ex lobortis pulvinar vel id sapien. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean ut nisl ac ipsum suscipit consectetur. Vestibulum in sodales turpis, eget elementum ipsum. Suspendisse ac magna sed turpis porttitor efficitur quis ac dolor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Phasellus convallis gravida lacus nec efficitur. Mauris euismod ex accumsan, convallis ante non, varius dui. Nam nec quam feugiat justo rhoncus aliquam. Phasellus lectus nisl, tristique vitae pellentesque ut, faucibus id turpis.


                  </div>
                  <p>By clicking Next you agree with the Terms and Conditions!</p>
                </div>
              </section>
              <h3>Finish</h3>
              <section>
                <div class="wizard-content">
                  Congratulations! You got the last step.
                </div>
              </section>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
