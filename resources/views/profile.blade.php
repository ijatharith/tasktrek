<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile - TaskTrek</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .input-transition { transition: all 0.2s ease-in-out; }
        
        /* FIX: Forces browser to hide default arrow so our custom arrow shows alone */
        select {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background-image: none;
        }
        select::-ms-expand { display: none; }
    </style>
</head>
<body class="bg-gray-100">

    <div class="flex h-screen overflow-hidden">
        
        <aside class="w-64 bg-[#0B1120] text-white flex flex-col justify-between hidden md:flex">
            <div>
                <div class="h-16 flex items-center px-6 border-b border-gray-800">
                    <div class="bg-blue-500 p-1 rounded-md mr-3">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    <span class="text-xl font-bold tracking-wide">TaskTrek</span>
                </div>

                <div class="px-4 py-6">
                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-4">Menu</p>
                    <nav class="space-y-2">
                        <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2 text-gray-400 hover:bg-gray-800 hover:text-white rounded-lg transition-colors group">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                            Dashboard
                        </a>
                        <a href="{{ route('tasks.index') }}" class="flex items-center px-4 py-2 text-gray-400 hover:bg-gray-800 hover:text-white rounded-lg transition-colors">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                            My Assignments
                        </a>
                    </nav>

                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mt-8 mb-4">Settings</p>
                    <nav class="space-y-2">
                        <a href="{{ route('profile') }}" class="flex items-center px-4 py-2 bg-gray-800 text-white rounded-lg transition-colors">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            Profile
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="flex items-center px-4 py-2 text-gray-400 hover:bg-gray-800 hover:text-white rounded-lg transition-colors w-full text-left">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                Log Out
                            </button>
                        </form>
                    </nav>
                </div> 
            </div> 

            <div class="bg-[#0f182c] p-4 flex items-center border-t border-gray-800 mt-auto">
                    <div class="h-10 w-10 rounded-full bg-gray-600 flex items-center justify-center overflow-hidden">
                        <svg class="h-12 w-12 text-gray-300 relative top-1" fill="currentColor" viewBox="0 0 24 24"><path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-white">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-gray-500">Student &bull; Sem {{ Auth::user()->semester }}</p>
                    </div>
                </div>
            </aside>

            <main class="flex-1 flex flex-col min-w-0 overflow-hidden">
                <header class="bg-white shadow-sm h-20 flex items-center justify-between px-8 z-10 border-b border-gray-200">
                    <div>
                        <h1 class="text-2xl font-semibold text-gray-800">Profile Settings</h1>
                        <p class="text-sm text-gray-500 mt-1">Manage your account information and preferences.</p>
                    </div>
                </header>

                <div class="flex-1 overflow-y-auto p-8">
                    
                    <div class="max-w-4xl mx-auto space-y-8">
                        
                        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                            <form action="{{ route('profile.update') }}" method="POST" id="profile-form">
                                @csrf
                                @method('PUT')
                                
                                <div class="px-8 py-8 relative">
                                    <div class="flex flex-col md:flex-row items-center md:items-end mb-6">
                                        <div class="h-24 w-24 rounded-full bg-white p-1 shadow-md">
                                            <div class="h-full w-full rounded-full bg-gray-200 flex items-center justify-center overflow-hidden">
                                                <svg class="h-20 w-20 text-gray-400 relative top-2" fill="currentColor" viewBox="0 0 24 24"><path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                                            </div>
                                        </div>
                                        <div class="mt-4 md:mt-0 md:ml-10 text-center md:text-left">
                                            <h2 class="text-2xl font-bold text-gray-800">{{ $user->name }}</h2>
                                            <p class="text-gray-500 font-medium">Student</p>
                                        </div>
                                        <div class="ml-auto mt-4 md:mt-0 flex space-x-3">
                                            <button type="button" id="edit-btn" onclick="enableEditing()" class="bg-blue-600 hover:bg-blue-700 text-white border border-transparent px-6 py-2 rounded-lg text-sm font-semibold transition shadow-sm">
                                                Edit Profile
                                            </button>
                                            <button type="button" id="cancel-btn" onclick="cancelEditing()" class="hidden bg-white hover:bg-gray-50 text-gray-700 border border-gray-300 px-6 py-2 rounded-lg text-sm font-semibold transition shadow-sm">
                                                Cancel
                                            </button>
                                            <button type="submit" id="save-btn" class="hidden bg-blue-600 hover:bg-blue-700 text-white border border-transparent px-6 py-2 rounded-lg text-sm font-semibold transition shadow-sm">
                                                Save Changes
                                            </button>
                                        </div>
                                    </div>

                                    @if (session('status') === 'profile-updated')
                                        <div class="bg-green-100 text-green-800 p-4 rounded-lg mb-6 text-center text-sm font-semibold">
                                            Profile updated successfully!
                                        </div>
                                    @endif

                                    @if ($errors->any())
                                        <div class="bg-red-50 text-red-600 p-4 rounded-lg mb-6">
                                            <ul class="list-disc list-inside text-sm">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                                        <div class="bg-gray-50 p-4 rounded-xl border border-gray-100">
                                            <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Student ID</p>
                                            <p class="text-lg font-bold text-gray-800">{{ $user->student_id }}</p>
                                        </div>
                                        <div class="bg-gray-50 p-4 rounded-xl border border-gray-100 relative group">
                                            <label for="semester" class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1 block">Semester</label>
                                            <input type="number" name="semester" id="semester" value="{{ old('semester', $user->semester) }}" class="input-transition text-lg font-bold text-gray-800 bg-transparent border-b border-transparent focus:border-blue-500 focus:outline-none w-full pb-0.5 pointer-events-none" readonly>                                     
                                        </div>
                                        <div class="bg-gray-50 p-4 rounded-xl border border-gray-100 relative group">
                                            <label for="level" class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1 block">Level</label>
                                            <input type="number" name="level" id="level" value="{{ old('level', $user->level) }}" class="input-transition text-lg font-bold text-gray-800 bg-transparent border-b border-transparent focus:border-blue-500 focus:outline-none w-full pb-0.5 pointer-events-none" readonly>
                                        </div>
                                    </div>
                                </div>
                        </div>

                        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
                            <h3 class="text-lg font-bold text-gray-800 mb-6 border-b border-gray-100 pb-4">Academic Information</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                                    <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="input-transition w-full bg-gray-50 border border-transparent rounded-lg px-4 py-2 text-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none pointer-events-none" readonly>
                                </div>
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                                    <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="input-transition w-full bg-gray-50 border border-transparent rounded-lg px-4 py-2 text-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none pointer-events-none" readonly>
                                </div>

                                <div class="md:col-span-2">
                                    <label for="faculty" class="block text-sm font-medium text-gray-700 mb-2">Faculty (Kulliyyah)</label>
                                    <div class="relative">
                                        <select id="faculty" name="faculty" onchange="updateCourses()" class="input-transition w-full bg-gray-50 border border-transparent rounded-lg px-4 py-2 text-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none appearance-none pointer-events-none" tabindex="-1">
                                            <option value="" disabled selected>-- Select Your Kulliyyah --</option>
                                        </select>
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500 hidden" id="faculty-arrow">
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                        </div>
                                    </div>
                                </div>

                                <div class="md:col-span-2">
                                    <label for="course" class="block text-sm font-medium text-gray-700 mb-2">Program</label>
                                    <div class="relative">
                                        <select id="course" name="course" class="input-transition w-full bg-gray-50 border border-transparent rounded-lg px-4 py-2 text-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none appearance-none pointer-events-none" tabindex="-1">
                                            <option value="" disabled selected>-- Select Faculty First --</option>
                                        </select>
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500 hidden" id="course-arrow">
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            
                            <div class="mt-8 pt-6 border-t border-gray-100 flex items-center justify-between">
                                <span class="text-xs text-gray-400">Last updated: {{ $user->updated_at->format('d M Y, h:i A') }}</span>
                            </div>
                        </div>

                        </form>
                    </div>
                </div>
            </main>
    </div>

<script>
    // 1. DATA: Complete Mapping of Faculties to Courses
    const facultyData = {
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

    const initialValues = {
        name: @json($user->name),
        email: @json($user->email),
        course: @json($user->course),
        faculty: @json($user->faculty),
        semester: @json($user->semester),
        level: @json($user->level)
    };

    // 2. Initialize Faculty Options dynamically
    function initFacultyOptions() {
        const facultySelect = document.getElementById('faculty');
        // Keep the first "Select" option, remove others if any exist
        facultySelect.innerHTML = '<option value="" disabled>-- Select Your Kulliyyah --</option>';
        
        Object.keys(facultyData).forEach(faculty => {
            const option = document.createElement('option');
            option.value = faculty;
            option.text = faculty;
            facultySelect.appendChild(option);
        });

        // Set initial selected faculty if it exists in data
        if(initialValues.faculty && facultyData[initialValues.faculty]) {
            facultySelect.value = initialValues.faculty;
        } else {
            facultySelect.value = ""; // Default to select prompt
        }
    }

    // 3. Populate Courses Dropdown
    function updateCourses(selectedCourse = null) {
        const facultySelect = document.getElementById('faculty');
        const courseSelect = document.getElementById('course');
        const selectedFaculty = facultySelect.value;
        
        courseSelect.innerHTML = '<option value="" disabled>-- Select Programme --</option>';

        if (selectedFaculty && facultyData[selectedFaculty]) {
            facultyData[selectedFaculty].forEach(course => {
                const option = document.createElement('option');
                option.value = course;
                option.text = course;
                courseSelect.appendChild(option);
            });
            // Logic to keep the correct course selected
            if (selectedCourse) {
                courseSelect.value = selectedCourse;
            } else if (initialValues.course && facultyData[selectedFaculty].includes(initialValues.course)) {
                courseSelect.value = initialValues.course;
            } else {
                courseSelect.value = "";
            }
        } else {
            courseSelect.innerHTML = '<option value="" disabled selected>-- Select Faculty First --</option>';
        }
    }

    // Initialize on Page Load
    document.addEventListener('DOMContentLoaded', () => {
        initFacultyOptions();
        updateCourses(initialValues.course);
    });

    // 4. Toggle Edit Mode Logic
    function enableEditing() {
        document.getElementById('edit-btn').classList.add('hidden');
        document.getElementById('cancel-btn').classList.remove('hidden');
        document.getElementById('save-btn').classList.remove('hidden');

        // IDs of all editable fields
        const inputs = ['name', 'email', 'semester', 'level', 'faculty', 'course'];
        
        inputs.forEach(id => {
            const el = document.getElementById(id);
            if (!el) return;

            // Remove Read-Only Restrictions
            el.readOnly = false;
            el.removeAttribute('tabindex');
            el.classList.remove('pointer-events-none', 'bg-gray-50', 'border-transparent', 'border-b', 'appearance-none');
            
            // Add Editing Styles
            if(id === 'semester' || id === 'level') {
                el.classList.add('border-gray-300', 'bg-white'); 
            } else {
                el.classList.add('bg-white', 'border-gray-300', 'shadow-sm');
            }
            
            // Show Custom Arrows for Select inputs
            if(id === 'faculty') document.getElementById('faculty-arrow').classList.remove('hidden');
            if(id === 'course') document.getElementById('course-arrow').classList.remove('hidden');
        });
    }

    function cancelEditing() {
        document.getElementById('edit-btn').classList.remove('hidden');
        document.getElementById('cancel-btn').classList.add('hidden');
        document.getElementById('save-btn').classList.add('hidden');

        const inputs = ['name', 'email', 'semester', 'level', 'faculty', 'course'];
        
        inputs.forEach(id => {
            const el = document.getElementById(id);
            if (!el) return;

            // Reset Data
            el.value = initialValues[id];

            // Re-apply Read-Only Restrictions
            el.readOnly = true;
            el.setAttribute('tabindex', '-1');
            el.classList.add('pointer-events-none', 'bg-gray-50', 'border-transparent', 'border-b');
            
            // For Selects specifically
            if(el.tagName === 'SELECT') {
                el.classList.add('appearance-none');
            }

            // Remove Editing Styles
            el.classList.remove('bg-white', 'border-gray-300', 'shadow-sm');
            
            // Hide Custom Arrows
            if(id === 'faculty') document.getElementById('faculty-arrow').classList.add('hidden');
            if(id === 'course') document.getElementById('course-arrow').classList.add('hidden');
        });

        // Re-run population to ensure dropdowns are correct based on reset data
        // We need to reset the faculty dropdown first if the user changed it but cancelled
        if(initialValues.faculty) document.getElementById('faculty').value = initialValues.faculty;
        updateCourses(initialValues.course);
    }
</script>
</body>
</html>