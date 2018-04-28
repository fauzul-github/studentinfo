<!doctype html>
<html>
        
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            
            #flash_message{
                position: absolute;
                bottom: 20px;
                right: 20px;
                z-index: 10;
            }
        </style>
    </head>
    <body>
            
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>

    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>       
    
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <br />
    <h3 align="center">Student Info(CRUD) using ajax in Laravel</h3>
    <br />

            <div id="" class="alert alert-success common_message" role="alert" style="display:none">
                
            </div>

    <div align="right">
        <button type="button" name="add" id="add_data" class="btn btn-success btn-sm">Add</button>
    </div>
    <br />
    <table id="student_table" class="table table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Mobile</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Email</th>
                
                <th>Image</th>
                <th>Action</th>
            </tr>
            
            @foreach($total_student as $student)
            
            <tr>
                <td>
                    @if (isset($student->name) && ($student->name!=null))
                        {{ $student->name }}
                    @else
                       {{ '' }} 
                    @endif
                </td>
                <td>
                    @if (isset($student->mobile_number) && ($student->mobile_number!=null))
                        {{ $student->mobile_number }}
                    @else
                       {{ '' }} 
                    @endif
                </td>
                <td>
                    @if (isset($student->gender) && ($student->gender!=null))
                        {{ $student->gender }}
                    @else
                       {{ '' }} 
                    @endif
                </td>
                <td>
                    @if (isset($student->address) && ($student->address!=null))
                        {{ $student->address }}
                    @else
                       {{ '' }} 
                    @endif
                </td>
                <td>
                    @if (isset($student->email_address) && ($student->email_address!=null))
                        {{ $student->email_address }}
                    @else
                       {{ '' }} 
                    @endif
                </td>
                
                <td> </td>
                <td>
                    <input type="hidden" name="student_id" value="{{ $student->id }}">
                    <button type="button" name="edit" id="" class="btn btn-success btn-sm edit_data">Edit</button>
                    <button type="button" name="delete" id="" class="btn btn-danger btn-sm delete_data">Delete</button>
                </td>
                
            </tr>
            
            @endforeach
        </thead>
    </table>
    {{ $total_student->links() }}
</div>

<div id="studentModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="student_form" enctype="multipart/form-data" >
                <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                   
                </div>
                
                <div class="modal-body">
                    {{csrf_field()}}
                    <span id="form_output"></span>
                    <div class="form-group">
                        <label>Enter Name</label>
                        <input type="text" name="name" id="name" class="form-control" required/>
                        <input type="hidden" name="st_id" id="st_id" value="" />
                    </div>
                    <div class="form-group">
                        <label>Enter Mobile Number</label>
                        <input type="text" name="mobile_number" id="mobile_number" class="form-control" maxlength="11" required/>(11 digit number)
                    </div>
                    <div class="form-group">
                        <label>Select Gender: </label>
                        <br>Male <input type="radio" name="gender" id="male" value="Male" required/>
                        Female <input type="radio" name="gender" id="female" value="Female" required/>
                    </div>
                    <div class="form-group">
                        <label>Address: <br></label>
                        <textarea name="address" rows="4" cols="30" id="address" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Enter Email Address</label>
                        <input type="email" name="email_address" id="email_address" class="form-control" required/>
                    </div>
                    
                    <div class="form-group">
                        <label>Upload Image</label>
                        <input type="file" name="image" />
                        <span class="text-muted">jpg, png, gif</span>
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="button_action" id="button_action" value="insert" />
                    <input type="submit" name="add" id="action" value="Add" class="btn btn-info" />
                    <button type="button" class="btn btn-default" data-dismiss="modal" id="close_button">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">

$(document).ready(function() {

    //$('#student_table').DataTable();
    $('#add_data').click(function(){
        $('#studentModal').modal('show');
        $('#student_form')[0].reset();
        $('#form_output').html('');
        $('#button_action').val('insert');
        $('#action').val('Add');
        
    });
    
    $( ".edit_data" ).on( "click", function() {
        
        
        $('#studentModal').modal('show');
        $('#student_form')[0].reset();
        $('#form_output').html('');
        $('#button_action').val('Edit');
        
        $('#action').val('Edit');
        var id = $(this).siblings('input').val();
        $('#st_id').val(id);
        
        $.ajax({
            url:'/studentinfo/edit',
            method:"POST",
            data: { id: id, _token: '{{csrf_token()}}' },
            dataType:"json",
            success:function(data)
            {
                
                 $("#name").val(data.name);  
                 $("#mobile_number").val(data.mobile_number); 
                 if(data.gender == "Male"){
                    $("#male").prop('checked', true); 
                }
                else if(data.gender == "Female"){
                    $("#female").prop('checked', true);
                }
                 $("#address").val(data.address); 
                 $("#email_address").val(data.email_address); 
                
            }
        })
        
        
    });
    
    $('.delete_data').click(function(){
        
        var checkstr =  confirm('are you sure you want to delete this?');
        if(checkstr == true){
          var id = $(this).siblings('input').val();
          $.ajax({
            url:'/studentinfo/delete',
            method:"POST",
            data: { id: id, _token: '{{csrf_token()}}' },
            dataType:"json",
            success:function(data)
            {
                if(data === 'Deleted'){
               $("div.common_message").css("display", "block");
                $('div.common_message').text('Data has been deleted'); 
                 
        }
            }
        })
          
        }else{
            return false;
        
        }
        return false;
});
    

    
    $('#student_form').on('submit', function(event){
        event.preventDefault();
        
        //var form_data = $(this).serialize();
        //alert(form_data);
        //return false;
        $.ajax({
            url:'/',
            method:"POST",
            data:new FormData($("#student_form")[0]),
            dataType:"json",
            processData: false,
            contentType: false,
            success:function(data)
            {
                //console.log(data);
                //return false;
                if(data === 'Edited'){
                    $("div.common_message").css("display", "block");
                    $('div.common_message').text('Data has been edited');
                    $( "#close_button" ).click();
                    //$('#student_table').DataTable().ajax.reload();
                }
                else{
                
               // $('#student_table thead').append(data);
               $("div.common_message").css("display", "block");
                $('div.common_message').text('Data has been added');
                $( "#close_button" ).click();
                    //$('#student_form')[0].reset();
                    //$('#action').val('Add');
                    //$('.modal-title').text('Add Data');
                    //$('#button_action').val('insert');
                    //$('#student_table').DataTable().ajax.reload();
                }
                
            }
        })
    });



});
</script>
    </body>
</html>
