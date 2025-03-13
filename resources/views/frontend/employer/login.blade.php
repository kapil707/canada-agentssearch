<x-layouts.frontend>
    <section id="aboutus" class="about_us_area   row">
        <div class="container">
            <div class="row about_row" style="padding-top:0;">
                <div class="tittle wow fadeInUpBig" style="text-align: left; visibility: visible;">
                    <h1 class="welc-text">  Employer Login  </h1>
                    <br>
                </div>
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-div">
                        <form class="text-left   row-20 ng-pristine ng-valid" action="{{route('employer.login.post')}}" method="post" enctype="multipart/form-data" name="contactus" id="contactus" accept-charset="UTF-8">
                            <input type="hidden" name="submitted" id="submitted" value="1">
                            @csrf
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="form-inner">
                                <div class="col-md-12">Email id <input id=" " type="text" class="form-control col-12" maxlength="40" name="email" value="{{old('email')}}"></div>
                                <div class="col-md-12" x-data="{showText: false}">
                                    Password: <input id=" " :type="showText ? 'text':'password'" class="form-control col-12" maxlength="40" name="password">
                                    <div class="d-flex moto-absolute-position items-center pr-3 cursor-pointer" style="top:6px;bottom:0;right: 22px; align-items: center" @click="showText = !showText">
                                        <template x-if="showText">
                                            <svg style="width: 1.75rem;height: 1.75rem;color: rgb(107 114 128);" class="w-6 h-6 text-gray-500 hover:text-gray-600 dark:text-gray-40" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                        </template>
                                        <template x-if="!showText">
                                            <svg style="width: 1.75rem;height: 1.75rem;color: rgb(107 114 128);" class="w-6 h-6 text-gray-500 hover:text-gray-600 dark:text-gray-40" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path></svg>
                                        </template>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <a href="">Forgot Username</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   <a href="">Forgot Password</a>    </div>
                                <div class="clearfix"></div>
                                <br>
                                <center>
                                    <input type="submit" value="Submit" class="btn">
                                </center>
                                <div class="clearfix"></div>
                                <hr>
                                <div class="text-center">
                                    Don't have an account ?
                                    <br>
                                    <a href="{{route('employer.register')}}" class="btn">Register</a>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.frontend>
