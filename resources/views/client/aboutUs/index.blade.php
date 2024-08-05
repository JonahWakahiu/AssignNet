<x-layouts.guest>

    @include('layouts.main-navigation')
    <div class="bg-fixed bg-cover px-3 py-10 w-full grid grid-cols-1 md:grid-cols-2"
        style="background-image: url('https://images.unsplash.com/photo-1487017159836-4e23ece2e4cf?q=80&w=1471&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')">

        <div class="self-center justify-self-center">
            <div class="w-full max-w-md text-white">

                <h3 class="text-white text-3xl md:text-4xl mb-1.5 md:mb-3">Why we do what
                    we do</h3>
                <p class="mb-2">
                    Several years ago, we decided that there was a need for a professional, ethical academic
                    writing
                    service that put customers first. We spent a while developing a business model and believe
                    we
                    have
                    accomplished our goal.
                </p>
                <p class="mb-2">
                    We hire only the best writers to be found; we ensure that customers get fully original,
                    customized
                    pieces of writing; and we have guarantees of privacy and satisfaction that ensure our
                    customers
                    get
                    exactly what they want in a safe and secure environment.
                </p>
            </div>
        </div>

        <div class="flex justify-center items-center">
            <x-calculate-price />
        </div>

    </div>
    <section class="mx-3 md:mx-10">



        <div class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-10">

            <div class="flex items-start gap-5">
                <div class=" p-1.5 rounded-xl bg-emerald-600">
                    <svg version="1.1" id="Uploaded to svgrepo.com" xmlns="http://www.w3.org/2000/svg" class="size-10"
                        xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" xml:space="preserve"
                        fill="#000000">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">

                            <g>
                                <g>
                                    <g>
                                        <path class=" fill-emerald-200"
                                            d="M20,10c4.418,0,8,3.582,8,8c0,1.368-0.345,2.654-0.95,3.78l0.945,3.359 c0.046,0.33-0.239,0.612-0.568,0.563l-3.196-0.921C23.002,25.549,21.555,26,20,26c-4.418,0-8-3.582-8-8S15.582,10,20,10z">
                                        </path>
                                    </g>
                                    <g>
                                        <path class="fill-emerald-200"
                                            d="M20,10c4.418,0,8,3.582,8,8c0,1.368-0.345,2.654-0.95,3.78l0.945,3.359 c0.046,0.33-0.239,0.612-0.568,0.563l-3.196-0.921C23.002,25.549,21.555,26,20,26c-4.418,0-8-3.582-8-8S15.582,10,20,10z">
                                        </path>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path class=" fill-emerald-50"
                                            d="M11,18c0-4.173,2.859-7.681,6.717-8.695C16.369,7.311,14.088,6,11.5,6C7.358,6,4,9.358,4,13.5 c0,1.275,0.32,2.474,0.881,3.525L4.005,20.14c-0.046,0.33,0.239,0.612,0.568,0.563l2.952-0.851C8.678,20.575,10.038,21,11.5,21 c0.008,0,0.016-0.001,0.025-0.001C11.191,20.059,11,19.053,11,18z">
                                        </path>
                                    </g>
                                    <g>
                                        <path class="fill-emerald-50"
                                            d="M11,18c0-4.173,2.859-7.681,6.717-8.695C16.369,7.311,14.088,6,11.5,6C7.358,6,4,9.358,4,13.5 c0,1.275,0.32,2.474,0.881,3.525L4.005,20.14c-0.046,0.33,0.239,0.612,0.568,0.563l2.952-0.851C8.678,20.575,10.038,21,11.5,21 c0.008,0,0.016-0.001,0.025-0.001C11.191,20.059,11,19.053,11,18z">
                                        </path>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>
                </div>
                <div>
                    <h5 class="text-2xl font-extrabold text-slate-800 mb-3">
                        About Us
                    </h5>
                    <p>
                        Our Essay Writing Service was launched when a group of freelance writers decided to turn a love
                        of writing and academics into a business that provides writing services for students. Since
                        then, the company has grown into an international presence. We work with a team of hundreds of
                        freelance writers from all over the world.
                    </p>
                </div>

            </div>

            <div class="flex items-start gap-5">
                <div class="h-12 min-w-12 grid place-items-center rounded-xl bg-orange-600">
                    <svg viewBox="0 0 24 24" class="size-9" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M15.5 7.5C15.5 9.433 13.933 11 12 11C10.067 11 8.5 9.433 8.5 7.5C8.5 5.567 10.067 4 12 4C13.933 4 15.5 5.567 15.5 7.5Z"
                                class="fill-orange-200"></path>
                            <path opacity="0.4"
                                d="M19.5 7.5C19.5 8.88071 18.3807 10 17 10C15.6193 10 14.5 8.88071 14.5 7.5C14.5 6.11929 15.6193 5 17 5C18.3807 5 19.5 6.11929 19.5 7.5Z"
                                class="fill-orange-200"></path>
                            <path opacity="0.4"
                                d="M4.5 7.5C4.5 8.88071 5.61929 10 7 10C8.38071 10 9.5 8.88071 9.5 7.5C9.5 6.11929 8.38071 5 7 5C5.61929 5 4.5 6.11929 4.5 7.5Z"
                                class="fill-orange-200"></path>
                            <path
                                d="M18 16.5C18 18.433 15.3137 20 12 20C8.68629 20 6 18.433 6 16.5C6 14.567 8.68629 13 12 13C15.3137 13 18 14.567 18 16.5Z"
                                class="fill-orange-50"></path>
                            <path opacity="0.4"
                                d="M22 16.5C22 17.8807 20.2091 19 18 19C15.7909 19 14 17.8807 14 16.5C14 15.1193 15.7909 14 18 14C20.2091 14 22 15.1193 22 16.5Z"
                                class="fill-orange-200"></path>
                            <path opacity="0.4"
                                d="M2 16.5C2 17.8807 3.79086 19 6 19C8.20914 19 10 17.8807 10 16.5C10 15.1193 8.20914 14 6 14C3.79086 14 2 15.1193 2 16.5Z"
                                class="fill-orange-50"></path>
                        </g>
                    </svg>
                </div>
                <div>
                    <h5 class="text-2xl font-extrabold text-slate-800 mb-3">
                        Our Team
                    </h5>
                    <p>
                        Our Essay Writing Service consists of a strong team of marketing professionals, experienced
                        writers, a customer support team, quality assurance pros, and operations staff. Each of these
                        business areas works in cooperation with one another so that students struggling with academic
                        difficulties can achieve their full academic potential.
                    </p>
                </div>

            </div>

            <div class="flex items-start gap-5">
                <div class="h-12 min-w-12 inline-flex items-center justify-center rounded-xl bg-violet-600">

                    <svg viewBox="0 0 24 24" class="size-8" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                        xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:cc="http://creativecommons.org/ns#"
                        xmlns:dc="http://purl.org/dc/elements/1.1/">
                        <g transform="translate(0 -1028.4)">
                            <rect height="22" width="1.5" y="1030.4" x="3" class="fill-violet-50" />
                            <path
                                d="m17.5 1030.4c-2.25 0-4.5 1.1-4.5 1.1s-2.25 1.1-4.5 1.1-4.5-1.1-4.5-1.1v13.7s2.25 1.2 4.5 1.2 4.5-1.2 4.5-1.2 2.25-1.1 4.5-1.1 4.5 1.1 4.5 1.1v-13.7s-2.25-1.1-4.5-1.1z"
                                class="fill-violet-200" />
                            <rect height="22" width="1" y="1030.4" x="2" fill="#bdc3c7"
                                class="fill-violet-50" />
                            <path
                                d="m17.5 1043.2c-2.25 0-4.5 1.2-4.5 1.2s-2.25 1.1-4.5 1.1-4.5-1.1-4.5-1.1v1s2.25 1.1 4.5 1.1 4.5-1.1 4.5-1.1 2.25-1.2 4.5-1.2 4.5 1.2 4.5 1.2v-1s-2.25-1.2-4.5-1.2z"
                                class="fill-violet-200" />
                            <path d="m3 1029.4c-0.5523 0-1 0.4-1 1h2c0-0.6-0.4477-1-1-1z" class="fill-violet-50" />
                            <path d="m3 1029.4v1h1c0-0.6-0.4477-1-1-1z" class="fill-violet-50" />
                        </g>
                    </svg>
                </div>
                <div>
                    <h5 class="text-2xl font-extrabold text-slate-800 mb-3">
                        Our Mission
                    </h5>
                    <p>
                        The mission of Boom Essays to provide academic writing services such as writing, editing, and
                        proofreading to high school and college students, including those who are pursuing advanced
                        degrees. They serve a wide variety of students who live and attend school in a variety of
                        geographic locations.
                    </p>
                </div>

            </div>

            <div class="flex items-start gap-5">
                <div class="h-12 min-w-12 inline-flex justify-center items-center rounded-xl bg-pink-600">

                    <svg fill="#000000" class="size-9" viewBox="0 0 24 24" id="secured-file-folder-2"
                        data-name="Flat Color" xmlns="http://www.w3.org/2000/svg" class="icon flat-color">
                        <path id="secondary" d="M6,2h9a2,2,0,0,1,2,2v6a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V4A2,2,0,0,1,6,2Z"
                            class="fill-pink-200"></path>
                        <path id="primary"
                            d="M19,18V9a2,2,0,0,0-2-2H14a1,1,0,0,0-.71.29L11.6,9H4a2,2,0,0,0-2,2v7a2,2,0,0,0,2,2H17A2,2,0,0,0,19,18Z"
                            class="fill-pink-50"></path>

                    </svg>
                </div>
                <div>
                    <h5 class="text-2xl font-extrabold text-slate-800 mb-3">

                        Social Responsibility
                    </h5>
                    <p>
                        Our principles understand the importance of social responsibility when it comes to education and
                        academia. Because of this, we have established policies and procedures to ensure that nobody is
                        able to fraudulently obtain a degree, certificate, or other document that will allow them to
                        enter a field for which they are not fully qualified.
                    </p>
                </div>

            </div>

        </div>

        <div class="mt-10">
            <h3 class="text-center text-3xl">Core Values</h3>

            <div class="mt-5 grid grid-cols-1 md:grid-cols-3 gap-5">
                <x-card-services-two>
                    <x-slot:svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-10 fill-blue-700" fill="currentColor"
                            class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                        </svg>
                    </x-slot>
                    <x-slot:title>
                        Attention
                    </x-slot>
                    Every customer is treated as special. Your requirements and instructions are taken into account
                    and then surpassed. We encourage our customers to provide as much detail as possible and our
                    team of expert analyst and writers will provide a paper modeled to your satisfaction.
                </x-card-services-two>

                <x-card-services-two>
                    <x-slot:svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-10 fill-blue-700" fill="currentColor"
                            class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                        </svg>
                    </x-slot>
                    <x-slot:title>
                        Reliability
                    </x-slot>
                    We guaranty reliable and expert services that surpass client’s expectations, and if by any chance
                    you are not satisfied, then we will offer a full refund. That’s the degree to which we value
                    integrity. Your loyalty is more value than all the money in the world.
                </x-card-services-two>

                <x-card-services-two>
                    <x-slot:svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-10 fill-blue-700" fill="currentColor"
                            class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                        </svg>
                    </x-slot>
                    <x-slot:title>
                        Professionalism
                    </x-slot>
                    With over a decade in this service domain, our contents adhere to strict academic standards and
                    professionalism. Our customer service representatives conduct themselves in only manners that
                    aim to serve you.
                </x-card-services-two>
            </div>
        </div>

        <div class="max-w-2xl mx-auto mt-10">
            <h4 class="text-center text-3xl">We are a legitimate writing service and our strong belief in academic
                integrity is
                held
                to the highest
                of
                standards</h4>
        </div>
        <div class="w-full max-w-2xl mx-auto mt-5">

            <p class="text-center text-pretty">Our main goal is to help present a conceptual model of papers you might
                be
                having
                challenges writing. By
                presenting a paper worthy of turning in, we provide you with what an excellent model of your required
                paper
                should look like.
            </p>
            <p class="text-center mt-3 text-pretty">

                Our writers are the very best in the writing service industry. We can proudly say this because of the
                significantly rigid and fierce employment protocols one has to go through before being employed as a
                writer
                with our firm.</p>
        </div>

        <h3 class="mt-10 text-center text-3xl text-pretty">Contact Us</h3>
        <p class="text-pretty">Here you will find contact details for which you can contact us with any questions about
            our company, our
            services or employment issues.</p>




    </section>
    @include('layouts.footer')

</x-layouts.guest>
