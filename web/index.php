<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
    <title>Test task for Winfox</title>
</head>
<body class="bg-light">
<div class="container mt-lg-5" id="app">
    <h3>Test task for Winfox</h3>
    <div class="row">
        <div class="col-md-3">
            <div class="card card-body">
                <form action="" @submit.prevent="onSubmit">
                    <div class="form-group">
                        <label for="">First Name</label>
                        <input type="text" v-model="firstname" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <label for="">Last Name</label>
                        <input type="text" v-model="lastname" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <label for="">Email</label>
                        <input type="email" v-model="email" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <button class="btn btn-sm btn-success">Add User</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="text-muted lead text-center" v-if="!getUsersLength">No record found</div>
                    <div class="table table-success table-striped" v-if="getUsersLength">
                        <table class="table table-borderless">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(record, i) in records" :key="record.id">
                                <td>{{i + 1}}</td>
                                <td>{{record.firstname}}</td>
                                <td>{{record.lastname}}</td>
                                <td>{{record.email}}</td>
                                <td>
                                    <a href="#" @click.prevent="deleteUser(record.id)" class="btn btn-danger">Delete</a>
                                    <a href="#" @click.prevent="editUser(record.id)" class="btn btn-primary"
                                       data-toggle="modal" data-target="#staticBackdrop">Edit</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div>
                <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
                     aria-labelledby="UpdateUser" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="UpdateUser">Update User</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" @submit.prevent="onUpdate">
                                    <div class="form-group">
                                        <label for="">First Name</label>
                                        <input type="text" v-model="update_firstname" class="form-control">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">Last Name</label>
                                        <input type="text" v-model="update_lastname" class="form-control">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">Email</label>
                                        <input type="email" v-model="update_email" class="form-control">
                                    </div>
                                    <div class="form-group mt-3">
                                        <button class="btn btn-sm btn-success">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/app.js"></script>
</body>