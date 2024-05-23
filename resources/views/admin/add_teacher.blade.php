@extends('layout')
@section('content')

<div class="col-12 col-lg-6 grid-margin">
                  <div class="card">
                      <div class="card-body">
                          <h2 class="card-title">ADD TEACHERS</h2>

                          @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


                          <form class="forms-sample" method="POST" action="{{URL::to('/save_teacher')}}" enctype="multipart/form-data">
                          @csrf   
                          <div class="form-group">
                                  <label for="exampleInputEmail1">Teacher Name</label>
                                  <input type="text" name="teachers_name" placeholder="Enter Name" class="form-control p-input"  aria-describedby="emailHelp" placeholder="Enter Name">
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputPassword1">Teacher Phone</label>
                                  <input type="text" class="form-control p-input" name="teachers_phone" placeholder="Enter Phone">
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputPassword1">Teacher Address</label>
                                  <input type="text" class="form-control p-input" name="teachers_address" placeholder="Enter Address">
                              </div>

                              
                              <div class="form-group">
                                  <label>Upload file</label>
                                  <div class="row">
                                    <div class="col-12">
                                      <label for="exampleInputFile2" class="btn btn-outline-primary btn-sm"><i class="mdi mdi-upload btn-label btn-label-left"></i>Image</label>
                                      <input type="file" name="teachers_image" class="form-control-file" id="exampleInputFile2" aria-describedby="fileHelp">
                                      <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
                                    </div>
                                  </div>
                              </div>
                            

                              <div class="form-group">
                                  <label for="exampleInputPassword1">Teacher's Department</label>
                                  <select class="form-control p-input" name="teachers_department">
                                    <option value="1">CSE</option>
                                    <option value="2">BBA</option>
                                    <option value="3">ECE</option>
                                    <option value="4">EEE</option>
                                    
                                  </select>
                              </div>
                              <button type="submit" class="btn btn-success btn-block">Add Teachers</button>
                          </form>
                      </div>
                  </div>
              </div>
@endsection