
<x-front-layout>

   
        <x-slot name="breadcrumbs">
    
    
            <!-- Start Breadcrumbs -->
            <div class="breadcrumbs">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="breadcrumbs-content">
                                <h1 class="page-title">Register Employee</h1>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-12">
                            <ul class="breadcrumb-nav">
                                <li><a href="{{ Route('home') }}"><i class="lni lni-home"></i> Home</a></li>
                                <li>تسجيل موظف</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Breadcrumbs -->
        </x-slot>
    
        <!-- Start Account Register Area -->
        <div class="account-login section">
            <div class="container">
                <div class="row">
 
                    <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
                        <div class="register-form">
                            <div class="title" style="text-align: center">
                                <h3>التسجيل فى طلب وظيفة</h3>
                                <p>نتشرف بكونك احد اعضاء فريق على افندى مستقبلا</p>
                            </div>
    
    
                    @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                            <form method="POST" action="{{route('jobs.store') }}" style="direction: rtl">
                                @csrf
    
                                <div class="col-md-12 col-sm-6">
                                    <div class="form-group"> 
                                        <input class="form-control" type="text" name="name" id="reg-fn"
                                           placeholder="الاسم رباعى كما هو بالبطاقة  " required>
                                        @error('name')
                                            <div class="alert alert-danger">
                                                <span class="text-danger">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
    
                                <div class="col-md-12 col-sm-6">
                                    <div class="form-group"> 
										<label>تاريخ الميلاد</label>
                                        <input class="form-control" type="date" name="birthday" id="reg-fn"  
                                        placeholder="تاريخ الميلاد" required>
                                    </div>
                                    @error('birthday')
                                        <div class="alert alert-danger">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                                    
                                <div class="col-md-12 col-sm-6">
                                    <div class="form-group"> 
                                        <input class="form-control" type="text" name="address" id="reg-fn"  
                                        placeholder="العنوان" required>
                                    </div>
                                    @error('address')
                                        <div class="alert alert-danger">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
    
                                <div class="col-md-12 col-sm-6">
                                    <div class="form-group">                                        
                                        <input class="form-control" type="email" name="email" id="reg-email"
                                         placeholder="البريد الالكترونى"   required>
                                        @error('email')
                                            <div class="alert alert-danger">
                                                <span class="text-danger">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-6">
                                    <div class="form-group">                                        
                                        <input class="form-control" type="tel" name="phone"  
                                         placeholder="رقم تليفون متصل بالواتس اب "   required>
                                        @error('phone')
                                            <div class="alert alert-danger">
                                                <span class="text-danger">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-6">
                                    <div class="form-group">                                        
                                  <select name="job" class="form-control" required>
                                    <option value="">اختار وظيفة</option>
                                    <option value="مدير تسويق">مدير تسويق</option>
                                    <option value="خدمة عملاء">خدمة عملاء</option>
                                    <option value="مدخل بيانات">مدخل بيانات</option>
                                  </select>
                                        @error('phone')
                                            <div class="alert alert-danger">
                                                <span class="text-danger">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>



                                <div class="col-md-12 col-sm-6">
                                    <div class="form-group">                                        
                                        <input class="form-control" type="text" name="grade"  
                                         placeholder="المؤهل الدراسي"   required>
                                        @error('grade')
                                            <div class="alert alert-danger">
                                                <span class="text-danger">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
 
 
                                <div class="col-md-12 col-sm-6">
                                    <div class="form-group">
                                        <textarea name="training" 
                                        placeholder="الدورات التدريبية"
                                        required class="form-control" cols="30" rows="10"></textarea>                                        
                                        
                                        @error('training')
                                            <div class="alert alert-danger">
                                                <span class="text-danger">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
 
                                <div class="col-md-12 col-sm-6">
                                    <div class="form-group">
                                        <textarea name="experience"
                                        placeholder="الخبرات السابقة "
                                        required class="form-control" cols="30" rows="10"></textarea>                                        
                                        
                                        @error('experience')
                                            <div class="alert alert-danger">
                                                <span class="text-danger">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
 
 
 
    
    
    
                                <div class="button">
                                    <button class="btn" type="submit">تسجيل</button>
                                </div>
    
                                <p class="outer-link" style="text-align: center">
                                   <p style="text-align: center"> تجري الرياح كما تجري سفينتنا  ***    نحن الرياح ونحن البحر والسـفـن

                                    <p style="text-align: center">إن الذي يرتجي شيئاً بهمتــــــه    ***   يلقاه لو حاربتــــــه الإنس والجــن

                                     <p style="text-align: center">فاقصد إلى قمــم الأشياء تدركها   ***   تجري الرياح كما رادت لها السفن
    
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Account Register Area -->
 
    </x-front-layout>
    