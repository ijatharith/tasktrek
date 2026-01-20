@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div>
            <div class="h-32 flex items-center justify-center px-6 border-b border-gray-800">
                <div class="bg-blue-500 p-1 rounded-md mr-3">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                </div>
                <span class="text-3xl font-bold items-center tracking-wide">TaskTrek</span>
            </div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Register as a Student
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Or
                <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                    sign in to existing account
                </a>
            </p>
        </div>

        <form class="mt-8 space-y-6" action="{{ route('register') }}" method="POST">
            @csrf
            
            <div class="rounded-md shadow-sm -space-y-px">
                
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                    <input id="name" name="name" type="text" value="{{ old('name') }}" required 
                        class="appearance-none block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                        placeholder="Enter your full name">
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required 
                        class="appearance-none block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                        placeholder="your.email@live.iium.edu.my">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input id="password" name="password" type="password" required 
                        class="appearance-none block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                        placeholder="Enter a secure password">
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="student_id" class="block text-sm font-medium text-gray-700">Student ID</label>
                    <input id="student_id" name="student_id" type="text" value="{{ old('student_id') }}" required 
                        class="appearance-none block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                        placeholder="e.g., 2110XXX">
                    @error('student_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="faculty" class="block text-sm font-medium text-gray-700">Kulliyyah (Faculty)</label>
                    <select id="faculty" name="faculty" required 
                        class="block w-full px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="">-- Select Your Kulliyyah --</option>
                        
                        <option value="Kulliyyah of Information and Communication Technology" {{ old('faculty') == 'Kulliyyah of Information and Communication Technology' ? 'selected' : '' }}>Kulliyyah of Information and Communication Technology (KICT)</option>
                        <option value="Kulliyyah of Engineering" {{ old('faculty') == 'Kulliyyah of Engineering' ? 'selected' : '' }}>Kulliyyah of Engineering (KOE)</option>
                        
                        <option value="Kulliyyah of Architecture and Environmental Design" {{ old('faculty') == 'Kulliyyah of Architecture and Environmental Design' ? 'selected' : '' }}>Kulliyyah of Architecture and Environmental Design (KAED)</option>
                        
                        <option value="Kulliyyah of Economics and Management Sciences" {{ old('faculty') == 'Kulliyyah of Economics and Management Sciences' ? 'selected' : '' }}>Kulliyyah of Economics and Management Sciences (KENMS)</option>
                        
                        <option value="AbdulHamid AbuSulayman Kulliyyah of Islamic Revealed Knowledge and Human Sciences" {{ old('faculty') == 'AbdulHamid AbuSulayman Kulliyyah of Islamic Revealed Knowledge and Human Sciences' ? 'selected' : '' }}>Kulliyyah of IRK & Human Sciences (KIRKHS)</option>
                        <option value="Kulliyyah of Education" {{ old('faculty') == 'Kulliyyah of Education' ? 'selected' : '' }}>Kulliyyah of Education (KOED)</option>
                        <option value="Kulliyyah of Sustainable Tourism and Contemporary Languages" {{ old('faculty') == 'Kulliyyah of Sustainable Tourism and Contemporary Languages' ? 'selected' : '' }}>Kulliyyah of Sustainable Tourism & Languages (KLM)</option>
                        
                        <option value="Ahmad Ibrahim Kulliyyah of Laws" {{ old('faculty') == 'Ahmad Ibrahim Kulliyyah of Laws' ? 'selected' : '' }}>Ahmad Ibrahim Kulliyyah of Laws (AIKOL)</option>
                        
                        <option value="Kulliyyah of Science" {{ old('faculty') == 'Kulliyyah of Science' ? 'selected' : '' }}>Kulliyyah of Science (KOS)</option>
                        <option value="Kulliyyah of Medicine" {{ old('faculty') == 'Kulliyyah of Medicine' ? 'selected' : '' }}>Kulliyyah of Medicine (KOM)</option>
                        <option value="Kulliyyah of Dentistry" {{ old('faculty') == 'Kulliyyah of Dentistry' ? 'selected' : '' }}>Kulliyyah of Dentistry (KOD)</option>
                        <option value="Kulliyyah of Pharmacy" {{ old('faculty') == 'Kulliyyah of Pharmacy' ? 'selected' : '' }}>Kulliyyah of Pharmacy (KOP)</option>
                        <option value="Kulliyyah of Allied Health Sciences" {{ old('faculty') == 'Kulliyyah of Allied Health Sciences' ? 'selected' : '' }}>Kulliyyah of Allied Health Sciences (KAHS)</option>
                        <option value="Kulliyyah of Nursing" {{ old('faculty') == 'Kulliyyah of Nursing' ? 'selected' : '' }}>Kulliyyah of Nursing (KON)</option>
                    </select>
                    @error('faculty')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="course" class="block text-sm font-medium text-gray-700">Programme</label>
                    <select id="course" name="course" required disabled
                        class="block w-full px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm disabled:bg-gray-100 disabled:text-gray-500">
                        <option value="">-- Select Kulliyyah First --</option>
                    </select>
                    @error('course')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="semester" class="block text-sm font-medium text-gray-700">Semester</label>
                    <input id="semester" name="semester" type="number" min="1" max="12" value="{{ old('semester', 1) }}" required 
                        class="appearance-none block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                        placeholder="e.g., 1">
                    @error('semester')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="level" class="block text-sm font-medium text-gray-700">Year of Study</label>
                    <select id="level" name="level" required 
                        class="block w-full px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="">-- Select Year --</option>
                        <option value="1" {{ old('level') == 1 ? 'selected' : '' }}>Year 1</option>
                        <option value="2" {{ old('level') == 2 ? 'selected' : '' }}>Year 2</option>
                        <option value="3" {{ old('level') == 3 ? 'selected' : '' }}>Year 3</option>
                        <option value="4" {{ old('level') == 4 ? 'selected' : '' }}>Year 4</option>
                        <option value="5" {{ old('level') == 5 ? 'selected' : '' }}>Year 5</option>
                    </select>
                    @error('level')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            @if ($errors->any())
                <div class="bg-red-50 border-l-4 border-red-400 p-4 rounded-md">
                    <div class="flex">
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-red-800">There were errors with your submission</h3>
                            <div class="mt-2 text-sm text-red-700">
                                <ul class="list-disc pl-5 space-y-1">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div>
                <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                        </svg>
                    </span>
                    Register
                </button>
            </div>
        </form>
    </div>
</div>

<script>
// Comprehensive IIUM Kulliyyah and Programme mapping
const kulliyyahProgrammes = {
    "Kulliyyah of Medicine": [ "Bachelor of Medicine and Bachelor of Surgery (Honours)" ],
    "Kulliyyah of Dentistry": [ "Bachelor of Dental Surgery (Honours)" ],
    "Kulliyyah of Pharmacy": [ "Bachelor of Pharmacy (Honours)" ],
    "Kulliyyah of Allied Health Sciences": [
        "Bachelor of Biomedical Science (Honours)", "Bachelor of Optometry (Honours)",
        "Bachelor of Dietetics (Honours)", "Bachelor of Audiology (Honours)",
        "Bachelor of Physiotherapy (Honours)", "Bachelor of Medical Imaging (Honours)",
        "Bachelor of Speech-Language Pathology (Honours)"
    ],
    "Kulliyyah of Nursing": [ "Bachelor of Nursing (Honours)" ],
    "Kulliyyah of Science": [
        "Bachelor of Biotechnology (Honours)", "Bachelor of Mathematical Sciences (Honours)",
        "Bachelor of Science in Applied Chemistry (Honours)", "Bachelor of Science in Physics (Honours)",
        "Bachelor of Science in Marine Science and Technology (Honours)", "Bachelor of Science in Applied Plant Sciences (Honours)"
    ],
    "Kulliyyah of Engineering": [
        "Bachelor of Civil Engineering (Honours)", "Bachelor of Mechanical Engineering (Honours)",
        "Bachelor of Electrical and Electronics Engineering (Honours)", "Bachelor of Manufacturing Engineering (Honours)",
        "Bachelor of Materials Engineering (Honours)", "Bachelor of Mechatronics Engineering (Honours)",
        "Bachelor of Aerospace Engineering (Honours)", "Bachelor of Chemical Engineering (Honours)"
    ],
    "Kulliyyah of Architecture and Environmental Design": [
        "Bachelor of Science (Architectural Studies) (Honours)", "Bachelor of Quantity Surveying (Honours)",
        "Bachelor of Urban and Regional Planning (Honours)", "Bachelor of Landscape Architecture (Honours)",
        "Bachelor of Applied Arts and Design (Honours)"
    ],
    "Kulliyyah of Information and Communication Technology": [
        "Bachelor in Computer Science (Honours)", "Bachelor in Information Technology (Honours)"
    ],
    "Kulliyyah of Economics and Management Sciences": [
        "Bachelor of Economics (Honours)", "Bachelor of Business Administration (Honours)",
        "Bachelor of Accounting (Honours)", "Bachelor of Finance (Islamic Finance) (Honours)"
    ],
    "AbdulHamid AbuSulayman Kulliyyah of Islamic Revealed Knowledge and Human Sciences": [
        "Bachelor of Islamic Revealed Knowledge and Heritage in Fiqh and Usul Fiqh (Honours)",
        "Bachelor of Islamic Revealed Knowledge and Heritage in Quran and Sunnah (Honours)",
        "Bachelor of Islamic Revealed Knowledge and Heritage in Usul al-Din and Comparative Religion (Honours)",
        "Bachelor of Islamic Revealed Knowledge and Heritage in Arabic Language and Literature (Honours)",
        "Bachelor of Halal Industry Management(Honours)", "Bachelor of Human Sciences in Communication (Honours)",
        "Bachelor of Human Sciences in History and Civilization (Honours)", "Bachelor of Human Sciences in Political Science (Honours)",
        "Bachelor of Human Sciences in Psychology (Honours)", "Bachelor of Human Sciences in Sociology and Anthropology (Honours)",
        "Bachelor of Human Sciences in English Language and Literature (Honours)"
    ],
    "Ahmad Ibrahim Kulliyyah of Laws": [ "Bachelor of Laws (Honours)", "Bachelor of Laws (Shari’ah) (Honours)" ],
    "Kulliyyah of Education": [
        "Bachelor of Education in Teaching of English as a Second Language (Honours)",
        "Bachelor of Education in Teaching of Arabic as a Second Language (Honours)",
        "Bachelor of Education in Guidance and Counselling (Honours)",
        "Bachelor of Education in Islamic Education (Honours)"
    ],
    "Kulliyyah of Sustainable Tourism and Contemporary Languages": [
        "Bachelor of Arts in English for International Communication (Honours)",
        "Bachelor of Arts in Malay for International Communication (Honours)",
        "Bachelor of Arts in Arabic for International Communication (Honours)",
        "Bachelor of Tourism Management (Honours)"
    ]
};

const facultySelect = document.getElementById('faculty');
const courseSelect = document.getElementById('course');

function populateCourses(selectedFaculty) {
    courseSelect.innerHTML = '<option value="">-- Select Your Programme --</option>';
    if (selectedFaculty && kulliyyahProgrammes[selectedFaculty]) {
        courseSelect.disabled = false;
        kulliyyahProgrammes[selectedFaculty].forEach(function(programme) {
            const option = document.createElement('option');
            option.value = programme;
            option.textContent = programme;
            courseSelect.appendChild(option);
        });
    } else {
        courseSelect.disabled = true;
        courseSelect.innerHTML = '<option value="">-- Select Kulliyyah First --</option>';
    }
}

facultySelect.addEventListener('change', function() {
    populateCourses(this.value);
});

window.addEventListener('DOMContentLoaded', function() {
    const oldFaculty = "{{ old('faculty') }}";
    const oldCourse = "{{ old('course') }}";
    if (oldFaculty) {
        facultySelect.value = oldFaculty;
        populateCourses(oldFaculty);
        if (oldCourse) {
            courseSelect.value = oldCourse;
        }
    }
});
</script>
@endsection