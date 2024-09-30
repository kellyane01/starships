<!-- resources/views/starships/form.blade.php -->

<div class="modal fade" id="starshipFormModal" tabindex="-1" aria-labelledby="starshipFormModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Adicionar/Editar Espaçonave</h5>
                <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="starshipForm">
                    <div class="form-group">
                        <input type="hidden" class="form-control form-input" id="starshipId">
                        <p class="text-red" id="id_error"></p>
                    </div>
                    <div class="form-group">
                        <label for="starshipName">Nome</label>
                        <input type="text" class="form-control form-input" id="starshipName" required>
                        <p class="text-red" id="name_error"></p>
                    </div>
                    <div class="form-group">
                        <label for="starshipModel">Modelo</label>
                        <input type="text" class="form-control form-input" id="starshipModel" required>
                        <p class="text-red" id="model_error"></p>
                    </div>
                    <div class="form-group">
                        <label for="starshipManufacturer">Fabricante</label>
                        <input type="text" class="form-control form-input" id="starshipManufacturer" required>
                        <p class="text-red" id="manufacturer_error"></p>
                    </div>
                    <div class="form-group">
                        <label for="starshipCost">Custo em Créditos</label>
                        <input type="text" class="form-control form-input" id="starshipCost">
                        <p class="text-red" id="cost_error"></p>
                    </div>
                    <div class="form-group">
                        <label for="starshipLength">Comprimento</label>
                        <input type="text" class="form-control form-input" id="starshipLength">
                        <p class="text-red" id="length_error"></p>
                    </div>
                    <div class="form-group">
                        <label for="starshipMaxSpeed">Velocidade Máxima na Atmosfera</label>
                        <input type="text" class="form-control form-input" id="starshipMaxSpeed">
                        <p class="text-red" id="max_atmosphering_speed_error"></p>
                    </div>
                    <div class="form-group">
                        <label for="starshipCrew">Tripulação</label>
                        <input type="text" class="form-control form-input" id="starshipCrew">
                        <p class="text-red" id="crew_error"></p>
                    </div>
                    <div class="form-group">
                        <label for="starshipPassengers">Passageiros</label>
                        <input type="text" class="form-control form-input" id="starshipPassengers">
                        <p class="text-red" id="passengers_error"></p>
                    </div>
                    <div class="form-group">
                        <label for="starshipCargoCapacity">Capacidade de Carga</label>
                        <input type="text" class="form-control form-input" id="starshipCargoCapacity">
                        <p class="text-red" id="cargo_capacity_error"></p>
                    </div>
                    <div class="form-group">
                        <label for="starshipConsumables">Consumíveis</label>
                        <input type="text" class="form-control form-input" id="starshipConsumables">
                        <p class="text-red" id="consumables_error"></p>
                    </div>
                    <div class="form-group">
                        <label for="starshipHyperdriveRating">Classificação do Hipermotor</label>
                        <input type="text" class="form-control form-input" id="starshipHyperdriveRating">
                        <p class="text-red" id="hyperdrive_rating_error"></p>
                    </div>
                    <div class="form-group">
                        <label for="starshipMGLT">MGLT</label>
                        <input type="text" class="form-control form-input" id="starshipMGLT">
                        <p class="text-red" id="MGLT_error"></p>
                    </div>
                    <div class="form-group">
                        <label for="starshipClass">Classe da Espaçonave</label>
                        <input type="text" class="form-control form-input" id="starshipClass">
                        <p class="text-red" id="starship_class_error"></p>
                    </div>
                    <button type="submit" class="btn btn-success my-2">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>
