<template>
	<div>
		<div id="navbar" class="bg-white relative shadow-md">
			<div class="logo flex justify-center">
				<div class="w-20 py-2">
					<inertia-link href="/">
						<img src="../../images/logo.png">
					</inertia-link>
				</div>
				<div class="absolute inset-y-0 right-0 pr-7 flex items-center">
					<inertia-link href="/login" class="hidden px-4 py-2 border-2 border-primary text-primary mr-2 font-bold hover:bg-primary hover:text-white sm:block">
						Login
					</inertia-link>
					<inertia-link href="/signup" class="hidden px-4 py-2 border-2 border-fourth font-bold text-fourth hover:bg-fourth hover:text-white sm:block">
						Sign up
					</inertia-link>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	name: "Navbar"
}
</script>