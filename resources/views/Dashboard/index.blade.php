@extends("layouts.dashboard")
@section('title')
    Dashboard
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
{{--                            <h3>{{$classrooms->count()}}</h3>--}}

                            <p>Number Classrooms</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-chalkboard"></i>

                        </div>
{{--                        <a href="{{route('classrooms.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
                    </div>
                </div>


                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
{{--                            <h3>{{ $classrooms->where('status', 'active')->count()}}</h3>--}}

                            <p>active Classrooms</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-chalkboard"></i>

                        </div>
{{--                        <a href="{{route('classrooms.index' , ['status' => 'active'])}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-gray">
                        <div class="inner">
{{--                            <h3>{{ $classrooms->where('status', 'inactive')->count()}}</h3>--}}

                            <p>inactive Classrooms</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-chalkboard"></i>

                        </div>
{{--                        <a href="{{route('classrooms.index' , ['status' => 'inactive'])}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
{{--                            <h3>{{$students->count()}}</h3>--}}

                            <p>Number Students</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-graduate"></i>

                        </div>
{{--                        <a href="{{route('students.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
                    </div>
                </div>

                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
{{--                            <h3>{{ $students->where('status', 'active')->count()}}</h3>--}}
                            <p>active Student</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-graduate"></i>                        </div>
{{--                        <a href="{{route('students.index' , ['status' => 'active'])}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
                    </div>
                </div>


                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-gray">
                        <div class="inner">
{{--                            <h3>{{ $students->where('status', 'inactive')->count()}}</h3>--}}

                            <p>inactive Student</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-graduate"></i>
                        </div>
{{--                        <a href="{{route('students.index' , ['status' => 'inactive'])}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
                    </div>
                </div>



            </div>
        </div>
        </div>
    </section>

@endsection
