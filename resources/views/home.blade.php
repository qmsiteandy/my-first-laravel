@extends('layouts.master')

@section('content')

<div class="main-content mt-5">
    <h2 class="mt-3 mb-5">Users</h2>

    <div class="d-flex justify-content-end">
        <button class="btn btn-success mb-3" onclick="showAddModal()" data-toggle="modal" data-target="#addModal" >Add User </button>
    </div>

    <!-- 使用 datatalbe 顯示商品資訊 -->
    <table id="products" class="border-gray table table-striped table-bordered my-5">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Note</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody class="user-content">
            <!-- user data foreach -->
            <div class="row">
            @foreach ($users as $user)
                <tr>
                    <th>{{$user->id}}</th>
                    <th>{{$user->name}}</th>
                    <th>{{$user->email}}</th>
                    <th>{{$user->note}}</th>
                    <th>
                        <button id="showMod-{{$user->id}}" class="btn btn-primary" data-toggle="modal" data-target="#modifyModal" onclick="showModModal({{$user}})">Modify</button>
                    </th>
                    <th>
                        <button id="delete-{{$user->id}}" class="btn btn-danger" onclick="showDeleteModal({{$user}})">Delete</button>
                    </th>
                </tr>
            @endforeach
            </div>
        </tbody>
    </table>

    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
                &times;
            </button>
            <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
            <p>Some text in the modal.</p>
            </div>
            <div class="modal-footer">
            <button
                type="button"
                class="btn btn-default"
                data-dismiss="modal"
            >
                Close
            </button>
            </div>
        </div>
        </div>
    </div>

    <!-- add user modal -->
    <div id="addModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeAddModal()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="add-form">
                        <div class="form-group">
                            <label for="add-name" class="col-form-label mr-3">Name</label>
                            <input id="add-name" type="text" class="add-name" name="name" />
                        </div>
                        <div class="form-group">
                            <label for="add-email" class="col-form-label mr-3">Email</label>
                            <input id="add-email" type="email" class="add-email" name="email" />
                        </div>
                        <div class="form-group">
                            <label for="add-note" class="col-form-label mr-3">Note</label>
                            <textarea id="add-note" type="text" class="add-note" name="note" ></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="addSubmit()" >Submit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeAddModal()" >Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modify User modal -->
    <div id="modifyModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modModalLabel">Modify User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeModifyModal()" >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="mod-form">
                        <div class="form-group">
                            <label for="mod-id" class="col-form-label mr-3">ID</label>
                            <input id="mod-id" type="text" class="mod-id" name="id" disabled="disabled" />
                        </div>
                        <div class="form-group">
                            <label for="mod-name" class="col-form-label mr-3">Name</label>
                            <input id="mod-name" type="text" class="mod-name" name="name" />
                        </div>
                        <div class="form-group">
                            <label for="mod-email" class="col-form-label mr-3">Email</label>
                            <input id="mod-email" type="email" class="mod-email" name="email" />
                        </div>
                        <div class="form-group">
                            <label for="mod-note" class="col-form-label mr-3">Note</label>
                            <textarea id="mod-note" type="text" class="mod-note" name="note" ></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="modSubmit()" >Submit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeModifyModal()" >Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- 刪除課程 modal -->
    <div id="deleteModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modModalLabel">Delete User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeDeleteModal()" >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="add-form">
                        <div class="form-group">
                            <label for="del-id" class="col-form-label mr-3">ID</label>
                            <input id="del-id" type="text" class="del-id" name="id" disabled="disabled" />
                        </div>
                        <div class="form-group">
                            <label for="del-name" class="col-form-label mr-3">Name</label>
                            <input id="del-name" type="text" class="del-name" name="name" />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="deleteSubmit()" >Delete</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeDeleteModal()" >Cancel</button>
                </div>
            </div>
      </div>
    </div>

</div>
<script>

    // 顯示新增商品 modal
    function showAddModal() {
        $("#addModal").modal("show");
    }

    // 關閉新增商品 modal
    function closeAddModal() {
        $("#addModal").modal("hide");
    }

    // 呼叫新增 API
    function addSubmit() {
        let data = {
            name: $("#add-name").val(),
            email: $("#add-email").val(),
            note: $("#add-note").val(),
        };
        $.ajax({
            url: "/api/user",
            method: 'POST',
            data: data,
            dataType: 'JSON',
            success:function(data){
                alert("Create Successfully");
                closeAddModal();
                location.reload();
            },
            error: function(error) {
                alert("系統發生錯誤，請洽管理員。");
                location.reload();
            }
        });
    }

    // 顯示修改商品 modal, 並帶入當前商品資訊
    function showModModal(user) {
      $("#mod-id").val(user.id);
      $("#mod-name").val(user.name);
      $("#mod-email").val(user.email);
      $("#mod-note").val(user.note);

      $("#modifyModal").modal("show");
    }

    // 修改商品
    function modSubmit() {
        let data = {
            name: $("#mod-name").val(),
            email: $("#mod-email").val(),
            note: $("#mod-note").val(),
        };
        let id = $("#mod-id").val();

        $.ajax({
            url: "/api/user/" + id,
            method: 'PUT',
            data: data,
            dataType: 'JSON',
            success:function(data){
                alert("Modify Successfully");
                closeAddModal();
                location.reload();
            },
            error: function(error) {
                alert("系統發生錯誤，請洽管理員。");
                location.reload();
            }
        });
    }

    // 關閉修改商品 modal
    function closeModifyModal() {
        $("#modifyModal").modal("hide");
    }

    // // 開啟刪除商品 modal
    function showDeleteModal(user) {
        $("#del-id").val(user.id);
        $("#del-name").val(user.name);

        $("#deleteModal").modal("show");
    }

    // 關閉刪除商品 modal
    function closeDeleteModal() {
      $("#deleteModal").modal("hide");
    }

    function deleteSubmit() {
        let id = $("#del-id").val();
        $.ajax({
            url: "/api/user/" + id,
            method: 'DELETE',
            success:function(data){
                alert("Delete Successfully");
                closeAddModal();
                location.reload();
            },
            error: function(error) {
                alert("系統發生錯誤，請洽管理員。");
                location.reload();
            }
        });
    }
  </script>

@endsection
