@extends('layouts.master')

@section('content')

<div class="main-content mt-5">
    <h2 class="mt-3 mb-5">Users</h2>

    <div class="d-flex justify-content-end">
        <button
        class="btn btn-success mb-3"
        onclick="showAddModal()"
        data-toggle="modal"
        data-target="#addModal"
        >
        Add User
        </button>
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
                        <button id="showMod-{{$user->id}}" class="btn btn-primary" data-toggle="modal" data-target="#modifyModal">Modify</button>
                    </th>
                    <th>
                        <button id="delete-{{$user->id}}" class="btn btn-danger">Delete</button>
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
    <!-- <div
        id="modifyModal"
        class="modal fade"
        tabindex="-1"
        role="dialog"
        aria-labelledby="modModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="modModalLabel">修改課程資訊</h5>
            <button
                type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close"
                onclick="closeModifyModal()"
            >
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <form id="mod-form">
                <div class="form-group">
                <label for="mod-name" class="col-form-label mr-3"
                    >課程名稱:</label
                >
                <input
                    id="mod-name"
                    type="text"
                    class="mod-name"
                    name="name"
                />
                </div>
                <div class="form-group">
                <label for="mod-name" class="col-form-label mr-3"
                    >教師編號:</label
                >
                <input
                    id="mod-teacher"
                    type="text"
                    class="mod-teacher"
                    name="teacher"
                    disabled
                />
                </div>
                <div class="form-group">
                <label for="mod-description" class="col-form-label mr-3"
                    >課程敘述:</label
                >
                <textarea
                    id="mod-description"
                    type="text"
                    class="mod-description"
                    name="description"
                ></textarea>
                </div>
                <div class="form-group">
                <label for="mod-price" class="col-form-label mr-3"
                    >課程價格:</label
                >
                <input
                    id="mod-price"
                    type="text"
                    class="mod-price"
                    name="price"
                />
                </div>
            </form>
            </div>
            <div class="modal-footer">
            <button
                type="button"
                class="btn btn-primary"
                onclick="modSubmit()"
            >
                確定修改
            </button>
            <button
                type="button"
                class="btn btn-secondary"
                data-dismiss="modal"
                onclick="closeModifyModal()"
            >
                取消
            </button>
            </div>
        </div>
        </div>
    </div>
    </div> -->

    <!-- 刪除課程 modal -->
      <!-- <div
        id="deleteModal"
        class="modal fade"
        tabindex="-1"
        role="dialog"
        aria-labelledby="deleteModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="deleteModalLabel">刪除課程資訊</h5>
              <button
                type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close"
                onclick="closeDeleteModal()"
              >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="del-form">
                <div class="form-group">
                  <label for="del-name" class="col-form-label mr-3"
                    >課程名稱:</label
                  ><input
                    id="del-name"
                    type="text"
                    class="del-name"
                    name="name"
                    disabled
                  />
                </div>
                <div class="form-group">
                  <label for="del-teacherId" class="col-form-label mr-3"
                    >教師編號:</label
                  ><input
                    id="del-teacherId"
                    type="text"
                    class="del-teacherId"
                    name="name"
                    disabled
                  />
                </div>
              </form>
            </div>
            <div class="modal-teacherId"></div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-primary"
                onclick="deleteSubmit()"
              >
                確定刪除
              </button>
              <button
                type="button"
                class="btn btn-secondary"
                data-dismiss="modal"
                onclick="closeDeleteModal()"
              >
                取消
              </button>
            </div>
          </div>
        </div>
      </div>
    </div> -->

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
                alert("created");
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
    function showModifyModal(course) {
      course = JSON.parse(course);
      $("#mod-name").val(course.name);
      $("#mod-teacher").val(course.teacherId);
      $("#mod-description").val(course.description);
      $("#mod-price").val(course.price);

      selectedId = course.id;

      $("#modifyModal").modal("show");
    }

    // 修改商品
    function modSubmit() {
      let data = {
        name: $("#mod-name").val(),
        teacherId: $("#mod-teacher").val(),
        description: $("#mod-description").val(),
        price: $("#mod-price").val(),
      };

      axios
        .put(`/api/course/${selectedId}`, data)
        .then((res) => {
          if (res.status === 200) {
            alert("修改成功！");
            this.closeModifyModal();
            location.reload();
          }
        })
        .catch((error) => {
          alert(error.response.data);
          location.reload();
        });
    }

    // 關閉修改商品 modal
    function closeModifyModal() {
      $("#modifyModal").modal("hide");
    }

    // 開啟刪除商品 modal
    function openDeleteModal(course) {
      course = JSON.parse(course);

      $("#del-name").val(course.name);
      $("#del-teacherId").val(course.teacherId);
      $("#deleteModal").modal("show");

      selectedId = course.id;
    }

    // 關閉刪除商品 modal
    function closeDeleteModal() {
      $("#deleteModal").modal("hide");
    }

    function deleteSubmit() {
      axios
        .delete(`/api/course/${selectedId}`, {
          data: { teacherId: $("#del-teacherId").val() },
        })
        .then((res) => {
          if (res.status === 200) {
            alert("刪除成功！");
            this.closeDeleteModal();
            location.reload();
          }
        })
        .catch((error) => {
          alert(error.response.data);
          location.reload();
        });
    }
  </script>

@endsection
