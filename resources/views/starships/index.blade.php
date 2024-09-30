@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Espaçonaves</h1>
        <button class="btn btn-primary" id="createStarshipBtn"><i class="fas fa-plus"></i> Adicionar Espaçonave</button>

        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Modelo</th>
                <th>Fabricante</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody id="starshipList"></tbody>
        </table>
    </div>

    @include('starships.modal')
    @include('starships.form')

    <script>
        let editStarshipId = null;

        function listStarships() {
            fetch('/api/starships')
                .then(response => response.json())
                .then(data => {
                    const starshipList = document.getElementById('starshipList');
                    starshipList.innerHTML = '';
                    data.forEach(starship => {
                        starshipList.innerHTML += `
                        <tr>
                            <td>${starship.id}</td>
                            <td>${starship.name}</td>
                            <td>${starship.model}</td>
                            <td>${starship.manufacturer}</td>
                            <td>
                                <button class="btn btn-info mx-1 my-1" onclick="showDetails(${starship.id})"><i class="fas fa-eye"></i></button>
                                <button class="btn btn-warning mx-1 my-1" onclick="showEditForm(${starship.id})"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger mx-1 my-1" onclick="deleteStarship(${starship.id})"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    `;
                    });
                });
        }

        function showDetails(id) {
            fetch(`/api/starships/${id}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('modalTitle').innerText = data.name;
                    document.getElementById('modalContent').innerHTML = `
                    <p>Modelo: ${data.model ?? '-'}</p>
                    <p>Fabricante: ${data.manufacturer ?? '-'}</p>
                    <p>Custo em Créditos: ${data.cost_in_credits ?? '-'}</p>
                    <p>Comprimento: ${data.length ?? '-'}</p>
                    <p>Velocidade Máxima na Atmosfera: ${data.max_atmosphering_speed ?? '-'}</p>
                    <p>Tripulação: ${data.crew ?? '-'}</p>
                    <p>Passageiros: ${data.passengers ?? 'n/a'}</p>
                    <p>Capacidade de Carga: ${data.cargo_capacity ?? '-'}</p>
                    <p>Consumíveis: ${data.consumables ?? '-'}</p>
                    <p>Classificação do Hipermotor: ${data.hyperdrive_rating ?? '-'}</p>
                    <p>MGLT: ${data.MGLT ?? '-'}</p>
                    <p>Classe da Espaçonave: ${data.starship_class ?? '-'}</p>
                `;
                    $('#detailsModal').modal('show');
                });
        }

        function showEditForm(id) {
            editStarshipId = id;
            fetch(`/api/starships/${id}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('starshipName').value = data.name;
                    document.getElementById('starshipModel').value = data.model;
                    document.getElementById('starshipManufacturer').value = data.manufacturer;
                    document.getElementById('starshipCost').value = data.cost_in_credits ?? null;
                    document.getElementById('starshipLength').value = data.length ?? null;
                    document.getElementById('starshipMaxSpeed').value = data.max_atmosphering_speed ?? null;
                    document.getElementById('starshipCrew').value = data.crew ?? null;
                    document.getElementById('starshipPassengers').value = data.passengers ?? null;
                    document.getElementById('starshipCargoCapacity').value = data.cargo_capacity ?? null;
                    document.getElementById('starshipConsumables').value = data.consumables ?? null;
                    document.getElementById('starshipHyperdriveRating').value = data.hyperdrive_rating ?? null;
                    document.getElementById('starshipMGLT').value = data.MGLT ?? null;
                    document.getElementById('starshipClass').value = data.starship_class ?? null;
                    $('#starshipFormModal').modal('show');
                });
        }

        function deleteStarship(id) {
            if (confirm("Tem certeza que deseja deletar esta espaçonave?")) {
                fetch(`/api/starships/${id}`, {
                    method: 'DELETE'
                })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Erro ao deletar a espaçonave');
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.message) {
                            alert(data.message);
                        }

                        listStarships();
                    })
                    .catch(error => {
                        console.error(error);
                        alert('Ocorreu um erro ao tentar deletar a espaçonave.');
                    });
            }
        }

        document.getElementById('createStarshipBtn').addEventListener('click', function () {
            editStarshipId = null;
            const inputs = Array.from(document.getElementsByClassName('form-input'));

            inputs.forEach((input) => {
                input.value = null
            })

            $('#starshipFormModal').modal('show');
        });

        document.getElementById('starshipForm').addEventListener('submit', function (event) {
            event.preventDefault();

            clearErrors();

            const data = {
                name: document.getElementById('starshipName').value,
                model: document.getElementById('starshipModel').value,
                manufacturer: document.getElementById('starshipManufacturer').value,
                cost_in_credits: document.getElementById('starshipCost').value,
                length: document.getElementById('starshipLength').value,
                max_atmosphering_speed: document.getElementById('starshipMaxSpeed').value,
                crew: document.getElementById('starshipCrew').value,
                passengers: document.getElementById('starshipPassengers').value,
                cargo_capacity: document.getElementById('starshipCargoCapacity').value,
                consumables: document.getElementById('starshipConsumables').value,
                hyperdrive_rating: document.getElementById('starshipHyperdriveRating').value,
                MGLT: document.getElementById('starshipMGLT').value,
                starship_class: document.getElementById('starshipClass').value,
            };

            const method = editStarshipId ? 'PUT' : 'POST';
            const url = editStarshipId ? `/api/starships/${editStarshipId}` : '/api/starships';

            fetch(url, {
                method: method,
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Erro ao criar espaçonave');
                    }
                    return response.json();
                })
                .then((data) => {
                    listStarships();
                    $('#starshipFormModal').modal('hide');

                    if (data.message) {
                        alert(data.message);
                    }
                })
                .catch(errorResponse => {
                    alert(errorResponse.message);
                    if (errorResponse.errors) {
                        showErrors(errorResponse.errors);
                    }
                });
        });

        function clearErrors() {
            const errorFields = document.querySelectorAll('.text-red');
            errorFields.forEach(field => field.innerText = '');
        }

        function showErrors(errors) {
            for (const field in errors) {
                const errorElement = document.getElementById(`${field}_error`);
                if (errorElement) {
                    errorElement.innerText = errors[field][0];
                }
            }
        }

        listStarships();
    </script>
@endsection
