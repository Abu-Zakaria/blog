<template>
	<div>
		<layout>
			<div class="flex justify-center mt-4">
				<div class="w-1/3 bg-white shadow-md p-6 rounded-lg">
					<p class="text-center text-2xl">Sign up</p>
					<form @submit="onSubmit">
						<div class="mb-4">
							<label>
								Name
								<input type="text" name="name" class="w-full bg-gray-100 px-4 py-2 rounded-md" v-model="name">
								<p class="text-red-300 italic" v-if="errors.hasOwnProperty('name')">
									{{ errors.name[0] }}
								</p>
							</label>
						</div>

						<div class="mb-4">
							<label>
								Email
								<input type="email" name="email" class="w-full bg-gray-100 px-4 py-2 rounded-md" v-model="email">
								<p class="text-red-300 italic" v-if="errors.hasOwnProperty('email')">
									{{ errors.email[0] }}
								</p>
							</label>
						</div>

						<div class="mb-4">
							<label>
								Password
								<input type="password" name="password" class="w-full bg-gray-100 px-4 py-2 rounded-md" v-model="password">
								<p class="text-red-300 italic" v-if="errors.hasOwnProperty('password')">
									{{ errors.password[0] }}
								</p>
							</label>
						</div>
						<div class="mb-4">
							<label>
								Password Confirmation
								<input type="password" name="password_confirmation" class="w-full bg-gray-100 px-4 py-2 rounded-md" v-model="password_confirmation">
								<p class="text-red-300 italic" v-if="errors.hasOwnProperty('password_confirmation')">
									{{ errors.password_confirmation[0] }}
								</p>
							</label>
						</div>

						<p class="text-center text-green-500 font-bold my-4" v-if="login_success">
							Successfully registered your account!
						</p>
						<div class="flex justify-center" v-if="login_success">
							<inertia-link href="/login" class="text-primary font-black">Login</inertia-link>
						</div>

						<div class="flex justify-end">
							<button class="bg-fourth mt-2 text-white px-4 py-2 rounded-md font-bold">Sign up</button>
						</div>
					</form>
				</div>
			</div>
		</layout>
	</div>
</template>

<script>
import Layout from "../../Shared/Layout.vue"

export default {
	name: "SignUp",
	components: {
		Layout
	},

	data() {
		return {
			name: '',
			email: '',
			password: '',
			password_confirmation: '',

			errors: {},
			login_success: false
		}
	},

	methods: {
		onSubmit(e)
		{
			this.errors = {};

			e.preventDefault()
			let _this = this;

			axios.post('/api/auth/register', {
				name: this.name,
				email: this.email,
				password: this.password,
				password_confirmation: this.password_confirmation,
			})
				.then(response => {
					_this.onSuccess(response.data)
				})
				.catch(error => {
					_this.onFailure(error.response.data)
				})
		},

		onSuccess(data)
		{
			console.log('data', data)
			this.login_success = true;
		},

		onFailure(data)
		{
			data = JSON.parse(data)
			console.log('error', data)
			this.errors = data
		}
	}

}
</script>