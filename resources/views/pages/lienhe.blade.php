@extends('pages.layout.index-lienhe')
@section('content')
<div class="col-md-8">
	<div class="address-company">
		<h4>&nbsp {{trans('contact.ntbic')}}</h4>
		<div class="col-md-7">
			<p><i class="fa fa-home" aria-hidden="true" style="color:#5bc0de"></i> {{trans('contact.address')}}</p>
			<p><i class="fa fa-phone-square" aria-hidden="true" style="color:#5bc0de"></i> Số điện thoại: (04) 3933 6570 </p>
            <p><i class="fa fa-fax" aria-hidden="true" style="color:#5bc0de"></i> Fax: (84.4) 39330267</p>
		</div>
		<div class="col-md-5">
			<p><span class="glyphicon glyphicon-envelope" style="color:#d9534f"></span> Email: info@ntbic.com</p>
            <p><i class="fa fa-skype" aria-hidden="true" style="color:#5bc0de"></i>  Skype: <a herf>skype..</a></p>
            <p><i class="fa fa-google-plus-square" aria-hidden="true" style="color:#d9534f"></i> Google: <a herf>google..</a></p> 	
		</div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14897.289055638508!2d105.84977022071602!3d21.019787648056234!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135abee0f48e19b%3A0x23d765710433152b!2zVmnhu4duIOG7qG5nIEThu6VuZyBDw7RuZyBOZ2jhu4c!5e0!3m2!1svi!2sus!4v1499428438113" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
	</div>
</div>
<div class="col-md-4">
	 	<div class="contact">
            <div class="content-title-1">
                <h3 class="uppercase">{{trans('contact.post_contact')}}</h3>
                <div class="blue"></div>
                <p class="c-font-lowercase">{{trans('contact.mess')}}
  				</p>
        	</div>
             <form action="lien-he" method="POST" id="createForm" class="form-horizontal">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-body">
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                            <button class="close" data-close="alert"></button>
                                Lỗi!
                            </div>
                        @endif
                         @if (session('message'))
                            <div class="alert alert-success">
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                                {{session('message')}}
                            </div>
                        @endif
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" name="hoten" placeholder="{{trans('contact.name')}}" data-required="1" class="form-control" value={{old('hoten')}}> 
                                 <span class="required"> {{$errors->first('hoten')}}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" name="email" placeholder="Email: abc123@gmail.com" data-required="1" class="form-control" value={{old('email')}}> 
                                 <span class="required"> {{$errors->first('email')}}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" name="sodienthoai" placeholder="{{trans('contact.phone')}}" data-required="1" class="form-control" value={{old('sodienthoai')}}> 
                                 <span class="required"> {{$errors->first('sodienthoai')}}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <textarea  name="message" placeholder="{{trans('contact.content')}}" rows="6" class="form-control" >{{old('message')}}</textarea>
                               <span class="required"> {{$errors->first('message')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="sol-md-12">
                                <button type="submit" class="btn green">{{trans('contact.post')}}</button>
                                
                        </div>
                    </div>
                </form>
       	</div>
</div>
@endsection
