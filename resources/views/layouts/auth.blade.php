<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EduConnect - {{ config('app.name', 'Laravel') }}</title>
    <!-- @vite(['resources/css/app.css', 'resources/js/app.js']) -->
    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <script>tailwind.config={theme:{extend:{colors:{primary:'#4F46E5',secondary:'#10B981'},borderRadius:{'none':'0px','sm':'4px',DEFAULT:'8px','md':'12px','lg':'16px','xl':'20px','2xl':'24px','3xl':'32px','full':'9999px','button':'8px'}}}}</script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet">
</head>
<body class="bg-gray-50 min-h-screen">
    <div class="min-h-screen flex flex-col">
        @yield('content')
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.5.0/echarts.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle password visibility
            const togglePassword = document.getElementById('toggle-password');
            const password = document.getElementById('password');
            
            if (togglePassword && password) {
                togglePassword.addEventListener('click', function() {
                    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                    password.setAttribute('type', type);
                    togglePassword.innerHTML = type === 'password' ? '<i class="ri-eye-line"></i>' : '<i class="ri-eye-off-line"></i>';
                });
            }
            
            // Login tabs
            const emailTab = document.getElementById('email-tab');
            const googleTab = document.getElementById('google-tab');
            const emailForm = document.getElementById('email-login-form');
            const googleForm = document.getElementById('google-login-form');
            
            if (emailTab && googleTab && emailForm && googleForm) {
                emailTab.addEventListener('click', function() {
                    emailTab.classList.add('text-primary', 'border-b-2', 'border-primary');
                    googleTab.classList.remove('text-primary', 'border-b-2', 'border-primary');
                    googleTab.classList.add('text-gray-500');
                    emailForm.classList.remove('hidden');
                    googleForm.classList.add('hidden');
                });
                
                googleTab.addEventListener('click', function() {
                    googleTab.classList.add('text-primary', 'border-b-2', 'border-primary');
                    emailTab.classList.remove('text-primary', 'border-b-2', 'border-primary');
                    emailTab.classList.add('text-gray-500');
                    googleForm.classList.remove('hidden');
                    emailForm.classList.add('hidden');
                });
            }
            
            // Role selection
            const roleBtns = document.querySelectorAll('.role-btn');
            
            roleBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    roleBtns.forEach(b => b.classList.remove('border-primary', 'bg-primary/5'));
                    this.classList.add('border-primary', 'bg-primary/5');
                });
            });
            
            // Login form submission
            const loginForm = document.getElementById('email-login-form');
            const loginSection = document.getElementById('login-section');
            const dashboardSection = document.getElementById('dashboard-section');
            
            if (loginForm && loginSection && dashboardSection) {
                loginForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    loginSection.classList.add('hidden');
                    dashboardSection.classList.remove('hidden');
                });
            }
            
            // Mobile menu toggle
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            
            if (mobileMenuButton && mobileMenu) {
                mobileMenuButton.addEventListener('click', function() {
                    mobileMenu.classList.toggle('hidden');
                });
            }
            
            // Role dropdown toggle
            const roleSelector = document.getElementById('role-selector');
            const roleDropdown = document.getElementById('role-dropdown');
            
            if (roleSelector && roleDropdown) {
                roleSelector.addEventListener('click', function() {
                    roleDropdown.classList.toggle('hidden');
                });
                
                // Close dropdown when clicking outside
                document.addEventListener('click', function(e) {
                    if (!roleSelector.contains(e.target) && !roleDropdown.contains(e.target)) {
                        roleDropdown.classList.add('hidden');
                    }
                });
            }
            
            // AI Assistant modal
            const aiAssistantBtn = document.getElementById('ai-assistant-btn');
            const aiAssistantModal = document.getElementById('ai-assistant-modal');
            const closeAiModal = document.getElementById('close-ai-modal');
            
            if (aiAssistantBtn && aiAssistantModal && closeAiModal) {
                aiAssistantBtn.addEventListener('click', function() {
                    aiAssistantModal.classList.remove('hidden');
                });
                
                closeAiModal.addEventListener('click', function() {
                    aiAssistantModal.classList.add('hidden');
                });
                
                // Close modal when clicking outside
                aiAssistantModal.addEventListener('click', function(e) {
                    if (e.target === aiAssistantModal) {
                        aiAssistantModal.classList.add('hidden');
                    }
                });
            }
            
            // Initialize performance chart
            const performanceChart = document.getElementById('performance-chart');
            
            if (performanceChart) {
                const chart = echarts.init(performanceChart);
                
                const option = {
                    animation: false,
                    tooltip: {
                        trigger: 'axis',
                        backgroundColor: 'rgba(255, 255, 255, 0.9)',
                        borderColor: '#e2e8f0',
                        textStyle: {
                            color: '#1f2937'
                        }
                    },
                    legend: {
                        data: ['Math', 'Science', 'Reading', 'Social Studies'],
                        bottom: 0,
                        textStyle: {
                            color: '#1f2937'
                        }
                    },
                    grid: {
                        left: '3%',
                        right: '4%',
                        bottom: '15%',
                        top: '3%',
                        containLabel: true
                    },
                    xAxis: {
                        type: 'category',
                        boundaryGap: false,
                        data: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
                        axisLine: {
                            lineStyle: {
                                color: '#e2e8f0'
                            }
                        },
                        axisLabel: {
                            color: '#1f2937'
                        }
                    },
                    yAxis: {
                        type: 'value',
                        axisLine: {
                            show: false
                        },
                        axisLabel: {
                            color: '#1f2937'
                        },
                        splitLine: {
                            lineStyle: {
                                color: '#e2e8f0'
                            }
                        }
                    },
                    series: [
                        {
                            name: 'Math',
                            type: 'line',
                            stack: 'Total',
                            smooth: true,
                            lineStyle: {
                                width: 3
                            },
                            showSymbol: false,
                            areaStyle: {
                                opacity: 0.1,
                                color: new echarts.graphic.LinearGradient(0, 0, 0, 1, [
                                    { offset: 0, color: 'rgba(87, 181, 231, 0.2)' },
                                    { offset: 1, color: 'rgba(87, 181, 231, 0.0)' }
                                ])
                            },
                            emphasis: {
                                focus: 'series'
                            },
                            data: [78, 80, 82, 85, 82, 86, 88, 90, 92],
                            color: 'rgba(87, 181, 231, 1)'
                        },
                        {
                            name: 'Science',
                            type: 'line',
                            stack: 'Total',
                            smooth: true,
                            lineStyle: {
                                width: 3
                            },
                            showSymbol: false,
                            areaStyle: {
                                opacity: 0.1,
                                color: new echarts.graphic.LinearGradient(0, 0, 0, 1, [
                                    { offset: 0, color: 'rgba(141, 211, 199, 0.2)' },
                                    { offset: 1, color: 'rgba(141, 211, 199, 0.0)' }
                                ])
                            },
                            emphasis: {
                                focus: 'series'
                            },
                            data: [82, 84, 85, 86, 88, 86, 85, 87, 90],
                            color: 'rgba(141, 211, 199, 1)'
                        },
                        {
                            name: 'Reading',
                            type: 'line',
                            stack: 'Total',
                            smooth: true,
                            lineStyle: {
                                width: 3
                            },
                            showSymbol: false,
                            areaStyle: {
                                opacity: 0.1,
                                color: new echarts.graphic.LinearGradient(0, 0, 0, 1, [
                                    { offset: 0, color: 'rgba(251, 191, 114, 0.2)' },
                                    { offset: 1, color: 'rgba(251, 191, 114, 0.0)' }
                                ])
                            },
                            emphasis: {
                                focus: 'series'
                            },
                            data: [75, 76, 78, 80, 82, 84, 85, 86, 88],
                            color: 'rgba(251, 191, 114, 1)'
                        },
                        {
                            name: 'Social Studies',
                            type: 'line',
                            stack: 'Total',
                            smooth: true,
                            lineStyle: {
                                width: 3
                            },
                            showSymbol: false,
                            areaStyle: {
                                opacity: 0.1,
                                color: new echarts.graphic.LinearGradient(0, 0, 0, 1, [
                                    { offset: 0, color: 'rgba(252, 141, 98, 0.2)' },
                                    { offset: 1, color: 'rgba(252, 141, 98, 0.0)' }
                                ])
                            },
                            emphasis: {
                                focus: 'series'
                            },
                            data: [80, 82, 84, 83, 82, 85, 86, 88, 90],
                            color: 'rgba(252, 141, 98, 1)'
                        }
                    ]
                };
                
                chart.setOption(option);
                
                window.addEventListener('resize', function() {
                    chart.resize();
                });
            }
        });
    </script>
</body>

</html>