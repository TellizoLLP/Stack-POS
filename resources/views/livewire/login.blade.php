<div class="flex items-center justify-center grow bg-center bg-no-repeat page-bg">
    <div class="card max-w-[370px] w-full">
        <form action="#" class="card-body flex flex-col gap-5 p-10" id="sign_in_form" method="get">
            <div class="text-center mb-2.5">
                <h3 class="text-lg font-medium text-gray-900 leading-none mb-2.5">
                    {{getStoreName()}}
                </h3>

            </div>


            <div class="flex flex-col gap-1">
                <label class="form-label font-normal text-gray-900">
                    {{ $lang->data['email'] ?? 'Email' }}
                </label>
                <input class="input" type="email" value=""
                    placeholder="{{ $lang->data['enter_email'] ?? 'Enter your email' }}" wire:model='email' />
                @error('email')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror

            </div>
            <div class="flex flex-col gap-1">
                <div class="flex items-center justify-between gap-1">
                    <label class="form-label font-normal text-gray-900">
                        {{ $lang->data['password'] ?? 'Password' }}
                    </label>
                    {{-- <a class="text-2sm link shrink-0" href="#">
                        Forgot Password?
                    </a> --}}
                </div>
                <div class="input" data-toggle-password="true">
                    <input name="user_password" type="password" value=""
                        placeholder="{{ $lang->data['enter_password'] ?? 'Enter your password' }}"
                        wire:model='password' />
                    <button class="btn btn-icon" data-toggle-password-trigger="true" type="button">
                        <i class="ki-filled ki-eye text-gray-500 toggle-password-active:hidden">
                        </i>
                        <i class="ki-filled ki-eye-slash text-gray-500 hidden toggle-password-active:block">
                        </i>
                    </button>
                </div>
                @error('password')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
                @error('login_error')
                    <span class="text-danger d-block">{{ $message }}</span>
                @enderror
            </div>
            <button class="btn btn-primary flex justify-center grow" wire:click.prevent='login'>
                {{ $lang->data['sign_in'] ?? 'Sign in' }}
            </button>
        </form>
    </div>
</div>

{{-- <div>
	<main class="d-flex w-100 h-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-4 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">
						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<div class="text-center mb-4">
										<h1>{{getStoreName()}}</h1>
									</div>
									<form>
										<div class="mb-3">
											<label class="form-label">{{$lang->data['email']??'Email'}}</label>
											<input class="form-control form-control-lg" type="email" name="email" placeholder="{{$lang->data['enter_email']??'Enter your email'}}" wire:model='email'/>
											@error('email')
												<span class="text-danger">{{$message}}</span>
											@enderror
										</div>
										<div class="mb-3">
											<label class="form-label">{{$lang->data['password']??'Password'}}</label>
											<input class="form-control form-control-lg " type="password" name="password" placeholder="{{$lang->data['enter_password']??'Enter your password'}}" wire:model='password'/>
											@error('password')
												<span class="text-danger d-block">{{$message}}</span>
											@enderror
											@error('login_error')
												<span class="text-danger d-block">{{$message}}</span>
											@enderror
										</div>
										<div>
											<label class="form-check">
												<input class="form-check-input" type="checkbox" value="remember-me" name="remember-me" checked>
												<span class="form-check-label">
													{{$lang->data['remember_me_next']??'Remember me next time'}}
												</span>
											</label>
										</div>
										<div class="text-center mt-3">
											<a href="#" class="btn btn-lg btn-primary" wire:click.prevent='login'>{{$lang->data['sign_in']??'Sign in'}}</a>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
</div> --}}
