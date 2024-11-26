@extends('layouts.app')

@section('title', 'Painel')

@section('content')
    <section class="container my-5">
        <div class="row">
            <!-- Menu Lateral -->
            <div class="col-md-3">
                <div class="menu-lateral">
                    <div class="list-group">
                        <a href="#perfil" class="list-group-item list-group-item-action active" data-bs-toggle="tab">
                            <i class="bi bi-person-fill me-2"></i> Meu Perfil
                        </a>
                        <a href="#criar-conta" class="list-group-item list-group-item-action" data-bs-toggle="tab">
                            <i class="bi bi-plus-circle-fill me-2"></i> Criar Conta no Jogo
                        </a>
                        <a href="#minhas-contas" class="list-group-item list-group-item-action" data-bs-toggle="tab">
                            <i class="bi bi-person-fill me-2"></i> Minhas Contas
                        </a>
                    </div>
                </div>
            </div>

            <!-- Conteúdo -->
            <div class="col-md-9">
                <div class="tab-content">
                    <!-- Perfil do Usuário -->
                    <div class="tab-pane fade show active" id="perfil">
                        <div class="card shadow-sm bg-dark text-white" style="border-radius: 15px;">
                            <div class="card-header text-center" style="background-color: rgba(33, 33, 57, 0.95);">
                                <h5 class="mb-0" style="color: #a8a4ff;">Meu Perfil</h5>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('update.profile') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="email" class="form-label">E-mail</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{ auth()->user()->email }}" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Usuário</label>
                                        <input type="text" class="form-control" id="username" name="username"
                                            value="{{ auth()->user()->username }}" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nome</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ auth()->user()->name }}" readonly>
                                    </div>
                                    <hr class="text-muted">
                                    <h6 class="text-muted">Alterar Senha</h6>
                                    <div class="mb-3">
                                        <label for="current_password" class="form-label">Senha Atual</label>
                                        <input type="password" class="form-control" id="current_password"
                                            name="current_password" required>
                                        @error('current_password')
                                            <div class="text-danger mt-2" style="font-size: 14px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="new_password" class="form-label">Nova Senha</label>
                                        <input type="password" class="form-control" id="new_password" name="new_password"
                                            required>
                                        @error('new_password')
                                            <div class="text-danger mt-2" style="font-size: 14px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="confirm_password" class="form-label">Confirmar Nova Senha</label>
                                        <input type="password" class="form-control" id="confirm_password"
                                            name="confirm_password" required>
                                        @error('confirm_password')
                                            <div class="text-danger mt-2" style="font-size: 14px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100">Salvar Alterações</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Criar Conta no Jogo -->
                    <div class="tab-pane fade" id="criar-conta">
                        <div class="card shadow-sm bg-dark text-white" style="border-radius: 15px;">
                            <div class="card-header text-center" style="background-color: rgba(33, 33, 57, 0.95);">
                                <h5 class="mb-0" style="color: #a8a4ff;">Criar Conta no Jogo</h5>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('create.game.account') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="cuenta" class="form-label">Conta</label>
                                        <input type="text" class="form-control" id="cuenta" name="cuenta" required
                                            placeholder="Escolha um nome de usuário">
                                        @error('cuenta')
                                            <div class="text-danger mt-2" style="font-size: 14px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="contraseña" class="form-label">Senha</label>
                                        <input type="password" class="form-control" id="contraseña" name="contraseña"
                                            required placeholder="Escolha uma senha">
                                        @error('contraseña')
                                            <div class="text-danger mt-2" style="font-size: 14px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">E-mail</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            required placeholder="Informe seu e-mail">
                                        @error('email')
                                            <div class="text-danger mt-2" style="font-size: 14px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="nombre" class="form-label">Nome</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre"
                                            placeholder="Informe seu nome">
                                        @error('nombre')
                                            <div class="text-danger mt-2" style="font-size: 14px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="apellido" class="form-label">Sobrenome</label>
                                        <input type="text" class="form-control" id="apellido" name="apellido"
                                            placeholder="Informe seu sobrenome">
                                        @error('apellido')
                                            <div class="text-danger mt-2" style="font-size: 14px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="pregunta" class="form-label">Pergunta Secreta</label>
                                        <input type="text" class="form-control" id="pregunta" name="pregunta"
                                            placeholder="Informe uma pergunta secreta">
                                        @error('pregunta')
                                            <div class="text-danger mt-2" style="font-size: 14px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="respuesta" class="form-label">Resposta Secreta</label>
                                        <input type="text" class="form-control" id="respuesta" name="respuesta"
                                            placeholder="Informe a resposta secreta">
                                        @error('respuesta')
                                            <div class="text-danger mt-2" style="font-size: 14px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="apodo" class="form-label">Apelido</label>
                                        <input type="text" class="form-control" id="apodo" name="apodo"
                                            placeholder="Informe um apelido">
                                        @error('apodo')
                                            <div class="text-danger mt-2" style="font-size: 14px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="pais" class="form-label">País</label>
                                        <select class="form-select" id="pais" name="pais">
                                            <option value="AF">Afghanistan</option>
                                            <option value="AL">Albania</option>
                                            <option value="DZ">Algeria</option>
                                            <option value="AS">American Samoa</option>
                                            <option value="AD">Andorra</option>
                                            <option value="AO">Angola</option>
                                            <option value="AI">Anguilla</option>
                                            <option value="AQ">Antarctica</option>
                                            <option value="AG">Antigua and Barbuda</option>
                                            <option value="AR">Argentina</option>
                                            <option value="AM">Armenia</option>
                                            <option value="AW">Aruba</option>
                                            <option value="AU">Australia</option>
                                            <option value="AT">Austria</option>
                                            <option value="AZ">Azerbaijan</option>
                                            <option value="BS">Bahamas</option>
                                            <option value="BH">Bahrain</option>
                                            <option value="BD">Bangladesh</option>
                                            <option value="BB">Barbados</option>
                                            <option value="BY">Belarus</option>
                                            <option value="BE">Belgium</option>
                                            <option value="BZ">Belize</option>
                                            <option value="BJ">Benin</option>
                                            <option value="BM">Bermuda</option>
                                            <option value="BT">Bhutan</option>
                                            <option value="BR">Brazil</option>
                                            <option value="BN">Brunei Darussalam</option>
                                            <option value="BG">Bulgaria</option>
                                            <option value="BF">Burkina Faso</option>
                                            <option value="BI">Burundi</option>
                                            <option value="KH">Cambodia</option>
                                            <option value="CM">Cameroon</option>
                                            <option value="CA">Canada</option>
                                            <option value="CV">Cape Verde</option>
                                            <option value="KY">Cayman Islands</option>
                                            <option value="CF">Central African Republic</option>
                                            <option value="TD">Chad</option>
                                            <option value="CL">Chile</option>
                                            <option value="CN">China</option>
                                            <option value="CO">Colombia</option>
                                            <option value="KM">Comoros</option>
                                            <option value="CG">Congo</option>
                                            <option value="CD">Congo, the Democratic Republic of the</option>
                                            <option value="CR">Costa Rica</option>
                                            <option value="CI">Côte d'Ivoire</option>
                                            <option value="HR">Croatia</option>
                                            <option value="CU">Cuba</option>
                                            <option value="CY">Cyprus</option>
                                            <option value="CZ">Czech Republic</option>
                                            <option value="DK">Denmark</option>
                                            <option value="DJ">Djibouti</option>
                                            <option value="DM">Dominica</option>
                                            <option value="DO">Dominican Republic</option>
                                            <option value="EC">Ecuador</option>
                                            <option value="EG">Egypt</option>
                                            <option value="SV">El Salvador</option>
                                            <option value="GQ">Equatorial Guinea</option>
                                            <option value="ER">Eritrea</option>
                                            <option value="EE">Estonia</option>
                                            <option value="ES">Espanha</option>
                                            <option value="ET">Ethiopia</option>
                                            <option value="FJ">Fiji</option>
                                            <option value="FI">Finland</option>
                                            <option value="FR">France</option>
                                            <option value="GA">Gabon</option>
                                            <option value="GM">Gambia</option>
                                            <option value="GE">Georgia</option>
                                            <option value="DE">Germany</option>
                                            <option value="GH">Ghana</option>
                                            <option value="GR">Greece</option>
                                            <option value="GD">Grenada</option>
                                            <option value="GU">Guam</option>
                                            <option value="GT">Guatemala</option>
                                            <option value="GN">Guinea</option>
                                            <option value="GW">Guinea-Bissau</option>
                                            <option value="GY">Guyana</option>
                                            <option value="HT">Haiti</option>
                                            <option value="HN">Honduras</option>
                                            <option value="HK">Hong Kong</option>
                                            <option value="HU">Hungary</option>
                                            <option value="IS">Iceland</option>
                                            <option value="IN">India</option>
                                            <option value="ID">Indonesia</option>
                                            <option value="IR">Iran, Islamic Republic of</option>
                                            <option value="IQ">Iraq</option>
                                            <option value="IE">Ireland</option>
                                            <option value="IL">Israel</option>
                                            <option value="IT">Italy</option>
                                            <option value="JM">Jamaica</option>
                                            <option value="JP">Japan</option>
                                            <option value="JO">Jordan</option>
                                            <option value="KZ">Kazakhstan</option>
                                            <option value="KE">Kenya</option>
                                            <option value="KI">Kiribati</option>
                                            <option value="KP">Korea, Democratic People's Republic of</option>
                                            <option value="KR">Korea, Republic of</option>
                                            <option value="KW">Kuwait</option>
                                            <option value="KG">Kyrgyzstan</option>
                                            <option value="LA">Lao People's Democratic Republic</option>
                                            <option value="LV">Latvia</option>
                                            <option value="LB">Lebanon</option>
                                            <option value="LS">Lesotho</option>
                                            <option value="LR">Liberia</option>
                                            <option value="LY">Libya</option>
                                            <option value="LI">Liechtenstein</option>
                                            <option value="LT">Lithuania</option>
                                            <option value="LU">Luxembourg</option>
                                            <option value="MO">Macao</option>
                                            <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                                            <option value="MG">Madagascar</option>
                                            <option value="MW">Malawi</option>
                                            <option value="MY">Malaysia</option>
                                            <option value="MV">Maldives</option>
                                            <option value="ML">Mali</option>
                                            <option value="MT">Malta</option>
                                            <option value="MH">Marshall Islands</option>
                                            <option value="MQ">Martinique</option>
                                            <option value="MR">Mauritania</option>
                                            <option value="MU">Mauritius</option>
                                            <option value="YT">Mayotte</option>
                                            <option value="MX">Mexico</option>
                                            <option value="FM">Micronesia, Federated States of</option>
                                            <option value="MD">Moldova, Republic of</option>
                                            <option value="MC">Monaco</option>
                                            <option value="MN">Mongolia</option>
                                            <option value="ME">Montenegro</option>
                                            <option value="MS">Montserrat</option>
                                            <option value="MA">Morocco</option>
                                            <option value="MZ">Mozambique</option>
                                            <option value="MM">Myanmar</option>
                                            <option value="NA">Namibia</option>
                                            <option value="NR">Nauru</option>
                                            <option value="NP">Nepal</option>
                                            <option value="NL">Netherlands</option>
                                            <option value="NC">New Caledonia</option>
                                            <option value="NZ">New Zealand</option>
                                            <option value="NI">Nicaragua</option>
                                            <option value="NE">Niger</option>
                                            <option value="NG">Nigeria</option>
                                            <option value="NU">Niue</option>
                                            <option value="NF">Norfolk Island</option>
                                            <option value="MP">Northern Mariana Islands</option>
                                            <option value="NO">Norway</option>
                                            <option value="OM">Oman</option>
                                            <option value="PK">Pakistan</option>
                                            <option value="PW">Palau</option>
                                            <option value="PS">Palestine, State of</option>
                                            <option value="PA">Panama</option>
                                            <option value="PG">Papua New Guinea</option>
                                            <option value="PY">Paraguay</option>
                                            <option value="PE">Peru</option>
                                            <option value="PH">Philippines</option>
                                            <option value="PN">Pitcairn</option>
                                            <option value="PL">Poland</option>
                                            <option value="PT">Portugal</option>
                                            <option value="PR">Puerto Rico</option>
                                            <option value="QA">Qatar</option>
                                            <option value="RE">Réunion</option>
                                            <option value="RO">Romania</option>
                                            <option value="RU">Russian Federation</option>
                                            <option value="RW">Rwanda</option>
                                            <option value="BL">Saint Barthélemy</option>
                                            <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                                            <option value="KN">Saint Kitts and Nevis</option>
                                            <option value="LC">Saint Lucia</option>
                                            <option value="MF">Saint Martin (French part)</option>
                                            <option value="PM">Saint Pierre and Miquelon</option>
                                            <option value="VC">Saint Vincent and the Grenadines</option>
                                            <option value="WS">Samoa</option>
                                            <option value="SM">San Marino</option>
                                            <option value="ST">Sao Tome and Principe</option>
                                            <option value="SA">Saudi Arabia</option>
                                            <option value="SN">Senegal</option>
                                            <option value="RS">Serbia</option>
                                            <option value="SC">Seychelles</option>
                                            <option value="SL">Sierra Leone</option>
                                            <option value="SG">Singapore</option>
                                            <option value="SX">Sint Maarten (Dutch part)</option>
                                            <option value="SK">Slovakia</option>
                                            <option value="SI">Slovenia</option>
                                            <option value="SB">Solomon Islands</option>
                                            <option value="SO">Somalia</option>
                                            <option value="ZA">South Africa</option>
                                            <option value="SS">South Sudan</option>
                                            <option value="ES">Spain</option>
                                            <option value="LK">Sri Lanka</option>
                                            <option value="SD">Sudan</option>
                                            <option value="SR">Suriname</option>
                                            <option value="SZ">Swaziland</option>
                                            <option value="SE">Sweden</option>
                                            <option value="CH">Switzerland</option>
                                            <option value="SY">Syrian Arab Republic</option>
                                            <option value="TW">Taiwan, Province of China</option>
                                            <option value="TJ">Tajikistan</option>
                                            <option value="TZ">Tanzania, United Republic of</option>
                                            <option value="TH">Thailand</option>
                                            <option value="TL">Timor-Leste</option>
                                            <option value="TG">Togo</option>
                                            <option value="TK">Tokelau</option>
                                            <option value="TO">Tonga</option>
                                            <option value="TT">Trinidad and Tobago</option>
                                            <option value="TN">Tunisia</option>
                                            <option value="TR">Turkey</option>
                                            <option value="TM">Turkmenistan</option>
                                            <option value="TC">Turks and Caicos Islands</option>
                                            <option value="TV">Tuvalu</option>
                                            <option value="UG">Uganda</option>
                                            <option value="UA">Ukraine</option>
                                            <option value="AE">United Arab Emirates</option>
                                            <option value="GB">United Kingdom</option>
                                            <option value="US">United States</option>
                                            <option value="UY">Uruguay</option>
                                            <option value="UZ">Uzbekistan</option>
                                            <option value="VU">Vanuatu</option>
                                            <option value="VE">Venezuela, Bolivarian Republic of</option>
                                            <option value="VN">Viet Nam</option>
                                            <option value="VG">Virgin Islands, British</option>
                                            <option value="VI">Virgin Islands, U.S.</option>
                                            <option value="YE">Yemen</option>
                                            <option value="ZM">Zambia</option>
                                            <option value="ZW">Zimbabwe</option>
                                        </select>
                                        @error('pais')
                                            <div class="text-danger mt-2" style="font-size: 14px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100">Criar Conta</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Minhas Contas -->
                    <div class="tab-pane fade" id="minhas-contas">
                        <div class="card shadow-sm bg-dark text-white" style="border-radius: 15px;">
                            <div class="card-header text-center" style="background-color: rgba(33, 33, 57, 0.95);">
                                <h5 class="mb-0" style="color: #a8a4ff;">Minhas Contas</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-dark table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Conta</th>
                                                <th>Apelido</th>
                                                <th>País</th>
                                                <th>Ogrinas</th>
                                                <th>Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach (auth()->user()->contas as $account)
                                                @php
                                                    $cuenta = \App\Models\Cuenta::find($account->cuenta_id);
                                                @endphp
                                                @if ($cuenta)
                                                    <tr>
                                                        <td>{{ $cuenta->cuenta }}</td>
                                                        <td>{{ $cuenta->apodo }}</td>
                                                        <td>{{ $cuenta->pais }}</td>
                                                        <td>{{ $cuenta->ogrinas }}</td>
                                                        <td>
                                                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                                data-bs-target="#editarContaModal"
                                                                data-id="{{ $cuenta->id }}"
                                                                data-cuenta="{{ $cuenta->cuenta }}"
                                                                data-apodo="{{ $cuenta->apodo }}"
                                                                data-contraseña="{{ $cuenta->contraseña }}">
                                                                Editar
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal de Edição -->
            <div class="modal fade" id="editarContaModal" tabindex="-1" aria-labelledby="editarContaModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content bg-dark text-white">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editarContaModalLabel">Editar Conta</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form method="POST" action="{{ route('update.password') }}">
                            @csrf
                            <div class="modal-body">
                                <input type="hidden" id="edit_id" name="id">
                                <div class="mb-3">
                                    <label for="edit_contraseña" class="form-label">Senha</label>
                                    <input type="password" class="form-control" id="edit_contraseña" name="contraseña">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Fim do Modal de Edição -->
    </section>
    <script>
        const editarContaModal = document.getElementById('editarContaModal');
        editarContaModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const id = button.getAttribute('data-id');
            const cuenta = button.getAttribute('data-cuenta');
            const apodo = button.getAttribute('data-apodo');
            const contraseña = button.getAttribute('data-contraseña');

            const modalIdInput = editarContaModal.querySelector('#edit_id');
            const modalCuentaInput = editarContaModal.querySelector('#edit_cuenta');
            const modalApodoInput = editarContaModal.querySelector('#edit_apodo');
            const modalContraseñaInput = editarContaModal.querySelector('#edit_contraseña');

            modalIdInput.value = id;
            modalCuentaInput.value = cuenta;
            modalApodoInput.value = apodo;
            modalContraseñaInput.value = contraseña;
        });
    </script>
@endsection
