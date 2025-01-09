@extends('admin.head')
@section('content')
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Add Time Slot</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard Home</a></li>
                            <li class="breadcrumb-item"><a href="/admin/timeManagement/addTimeSlot">Add Time Slot</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">

                    @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <strong>{{ \Session::get('success') }}</strong>
                    </div>
                    @endif
                    @if (\Session::has('delete'))
                    <div class="alert alert-danger">
                        <strong>{{ \Session::get('delete') }}</strong>
                    </div>
                    @endif
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="card-body">
                        <h5>Add Time Details</h5>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <form action="/admin/addTimeSlot" method="post" enctype="multipart/form-data">
                                    @csrf
  
                                    <div class="form-group">
                                        <label >Main Subject Stream</label>                                          
                                        <select required  id="mainCategory" class="form-control">
                                            <option selected value="">Select Main Stream</option>
                                            <option value="physical">Physical Science stream</option>
                                            <option value="science">Science stream</option>
                                            <option value="commerce">Commerce stream</option>
                                            <option value="arts">Arts stream</option>
                                            <option value="technology">Technology stream</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label >Sub Subject Stream</label>                                          
                                        <select required  name="Teach_stream" id="subCategory" class="form-control">    
                                           <option selected value="">Select Sub Stream</option>       
                                        </select>
                                    </div>


                                    
                                    <div class="form-group">
                                        <label class="form-label">Dates</label>
                                        <div class="selectgroup selectgroup-pills">

                                        
                                            <label class="selectgroup-item">
                                             <div class="custom-control custom-checkbox">
                                                <input type="checkbox" name="Monday" class="custom-control-input">
                                                <label class="custom-control-label" for="customCheck1">Monday</label>
                                             </div>
                                  
                                            </label>


                                            <label class="selectgroup-item">
                                             <div class="custom-control custom-checkbox">
                                                <input type="checkbox"  name="Tuesday" class="custom-control-input">
                                                <label class="custom-control-label" for="customCheck1">Tuesday</label>
                                             </div>
                                         
                                            </label>


                                            <label class="selectgroup-item">
                                             <div class="custom-control custom-checkbox">
                                                <input type="checkbox"  name="Wednesday" class="custom-control-input">
                                                <label class="custom-control-label" for="customCheck1">Wednesday</label>
                                             </div>
                                         
                                            </label>


                                            <label class="selectgroup-item">
                                             <div class="custom-control custom-checkbox">
                                                <input type="checkbox"  name="Thursday" class="custom-control-input">
                                                <label class="custom-control-label" for="customCheck1">Thursday</label>
                                             </div>
                                         
                                            </label>


                                            <label class="selectgroup-item">
                                             <div class="custom-control custom-checkbox">
                                                <input type="checkbox"  name="Friday" class="custom-control-input">
                                                <label class="custom-control-label" for="customCheck1">Friday</label>
                                             </div>
                                         
                                            </label>

                                            <label class="selectgroup-item">
                                             <div class="custom-control custom-checkbox">
                                                <input type="checkbox"  name="Saturday" class="custom-control-input">
                                                <label class="custom-control-label" for="customCheck1">Saturday</label>
                                             </div>
                                         
                                            </label>

                                            <label class="selectgroup-item">
                                             <div class="custom-control custom-checkbox">
                                                <input type="checkbox"  name="Sunday"  class="custom-control-input">
                                                <label class="custom-control-label" for="customCheck1">Sunday</label>
                                             </div>
                                         
                                            </label>


                                           
                                        </div>
                                    </div>
                        


                                    <div class="form-group">
                                        <label class="form-label">Time Slot</label>
                                        <div class="selectgroup selectgroup-pills">

                                        
                                            <label class="selectgroup-item">
                                             <div class="custom-control custom-checkbox">
                                                <input type="checkbox" name="Monday" class="custom-control-input">
                                                <label class="custom-control-label" for="customCheck1">8AM-10AM</label>
                                             </div>
                                  
                                            </label>


                                            <label class="selectgroup-item">
                                             <div class="custom-control custom-checkbox">
                                                <input type="checkbox"  name="Tuesday" class="custom-control-input">
                                                <label class="custom-control-label" for="customCheck1">10AM-12AM</label>
                                             </div>
                                         
                                            </label>


                                            <label class="selectgroup-item">
                                             <div class="custom-control custom-checkbox">
                                                <input type="checkbox"  name="Wednesday" class="custom-control-input">
                                                <label class="custom-control-label" for="customCheck1">12AM-2PM</label>
                                             </div>
                                         
                                            </label>


                                            <label class="selectgroup-item">
                                             <div class="custom-control custom-checkbox">
                                                <input type="checkbox"  name="Thursday" class="custom-control-input">
                                                <label class="custom-control-label" for="customCheck1">2AM-10AM</label>
                                             </div>
                                         
                                            </label>


                                            <label class="selectgroup-item">
                                             <div class="custom-control custom-checkbox">
                                                <input type="checkbox"  name="Friday" class="custom-control-input">
                                                <label class="custom-control-label" for="customCheck1">8AM-10AM</label>
                                             </div>
                                         
                                            </label>

                                            <label class="selectgroup-item">
                                             <div class="custom-control custom-checkbox">
                                                <input type="checkbox"  name="Saturday" class="custom-control-input">
                                                <label class="custom-control-label" for="customCheck1">Saturday</label>
                                             </div>
                                         
                                            </label>

                                            <label class="selectgroup-item">
                                             <div class="custom-control custom-checkbox">
                                                <input type="checkbox"  name="Sunday"  class="custom-control-input">
                                                <label class="custom-control-label" for="customCheck1">Sunday</label>
                                             </div>
                                         
                                            </label>


                                           
                                        </div>
                                    </div>




                                    <button type="submit" class="btn  btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

      
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>


    <script>
  $(document).ready(function() {
      $('#mainCategory').change(function() {
          var mainCategory = $(this).val();

          // AJAX request to the backend
          $.ajax({
              url: '/teacher/getSubCategories',  // Your backend route
              type: 'GET',
              data: { category: mainCategory },
              success: function(response) {
                  // Clear the subcategory dropdown
                  $('#subCategory').empty();

                  // Add new options from the response data
                  // $('#subCategory').append('<option value="">Select Sub Category</option>');
                  $.each(response.subCategories, function(index, subCategory) {
                      $('#subCategory').append('<option value="'+subCategory.subj_ID+'">'+subCategory.subj_name+'</option>');
                  });
              },
              error: function(xhr, status, error) {
                  console.error("Error fetching subcategories: ", error);
              }
          });
      });
  });
</script>

    @endsection