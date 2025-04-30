<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students - EduConnect</title>
    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <script>tailwind.config={theme:{extend:{colors:{primary:'#4f46e5',secondary:'#f97316'},borderRadius:{'none':'0px','sm':'4px',DEFAULT:'8px','md':'12px','lg':'16px','xl':'20px','2xl':'24px','3xl':'32px','full':'9999px','button':'8px'}}}}</script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Include in your blade -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.5.0/echarts.min.js"></script>
    <style>
        :where([class^="ri-"])::before { content: "\f3c2"; }
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f9fafb;
        }
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background-color: #d1d5db;
            border-radius: 3px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background-color: #f3f4f6;
        }
        .custom-switch {
            position: relative;
            display: inline-block;
            width: 44px;
            height: 24px;
        }
        .custom-switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }
        .switch-slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #e5e7eb;
            transition: .4s;
            border-radius: 34px;
        }
        .switch-slider:before {
            position: absolute;
            content: "";
            height: 18px;
            width: 18px;
            left: 3px;
            bottom: 3px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }
        input:checked + .switch-slider {
            background-color: #4f46e5;
        }
        input:checked + .switch-slider:before {
            transform: translateX(20px);
        }
        .custom-radio {
            display: flex;
            align-items: center;
            cursor: pointer;
        }
        .custom-radio-input {
            appearance: none;
            width: 18px;
            height: 18px;
            border: 2px solid #d1d5db;
            border-radius: 50%;
            margin-right: 8px;
            position: relative;
            cursor: pointer;
        }
        .custom-radio-input:checked {
            border-color: #4f46e5;
        }
        .custom-radio-input:checked::after {
            content: "";
            position: absolute;
            top: 3px;
            left: 3px;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background-color: #4f46e5;
        }
        .custom-checkbox {
            display: flex;
            align-items: center;
            cursor: pointer;
        }
        .custom-checkbox-input {
            appearance: none;
            width: 18px;
            height: 18px;
            border: 2px solid #d1d5db;
            border-radius: 4px;
            margin-right: 8px;
            position: relative;
            cursor: pointer;
        }
        .custom-checkbox-input:checked {
            background-color: #4f46e5;
            border-color: #4f46e5;
        }
        .custom-checkbox-input:checked::after {
            content: "";
            position: absolute;
            top: 2px;
            left: 5px;
            width: 5px;
            height: 10px;
            border: solid white;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }
        .custom-range {
            -webkit-appearance: none;
            width: 100%;
            height: 6px;
            border-radius: 5px;
            background: #e5e7eb;
            outline: none;
        }
        .custom-range::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background: #4f46e5;
            cursor: pointer;
            border: 2px solid white;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        .custom-range::-moz-range-thumb {
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background: #4f46e5;
            cursor: pointer;
            border: 2px solid white;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        .student-modal {
            display: none;
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            width: 100%;
            max-width: 600px;
            background-color: white;
            z-index: 50;
            box-shadow: -5px 0 15px rgba(0, 0, 0, 0.1);
            overflow-y: auto;
        }
        .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 40;
        }
        .add-student-modal {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            max-width: 500px;
            background-color: white;
            z-index: 50;
            border-radius: 8px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="flex h-screen bg-gray-50">
        <!-- Sidebar -->
        @include('layouts.sidebar')

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Navigation -->
            @yield('content')
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Performance Distribution Chart
            const performanceDistributionChart = echarts.init(document.getElementById('performance-distribution-chart'));
            const performanceDistributionOption = {
                animation: false,
                tooltip: {
                    trigger: 'axis',
                    backgroundColor: 'rgba(255, 255, 255, 0.8)',
                    borderColor: '#E5E7EB',
                    textStyle: {
                        color: '#1F2937'
                    }
                },
                legend: {
                    data: ['Class 8A', 'Class 9B', 'Class 10C', 'Class 11A'],
                    bottom: 0,
                    textStyle: {
                        color: '#1F2937'
                    }
                },
                grid: {
                    left: '3%',
                    right: '3%',
                    top: '3%',
                    bottom: '15%',
                    containLabel: true
                },
                xAxis: {
                    type: 'category',
                    data: ['<60%', '60-70%', '70-80%', '80-90%', '90-100%'],
                    axisLine: {
                        lineStyle: {
                            color: '#E5E7EB'
                        }
                    },
                    axisLabel: {
                        color: '#6B7280'
                    }
                },
                yAxis: {
                    type: 'value',
                    name: 'Number of Students',
                    nameTextStyle: {
                        color: '#6B7280'
                    },
                    axisLine: {
                        show: false
                    },
                    axisLabel: {
                        color: '#6B7280'
                    },
                    splitLine: {
                        lineStyle: {
                            color: '#F3F4F6'
                        }
                    }
                },
                series: [
                    {
                        name: 'Class 8A',
                        type: 'bar',
                        data: [2, 5, 12, 8, 5],
                        itemStyle: {
                            color: 'rgba(87, 181, 231, 1)',
                            borderRadius: [4, 4, 0, 0]
                        },
                        emphasis: {
                            itemStyle: {
                                opacity: 0.8
                            }
                        }
                    },
                    {
                        name: 'Class 9B',
                        type: 'bar',
                        data: [3, 7, 10, 6, 4],
                        itemStyle: {
                            color: 'rgba(141, 211, 199, 1)',
                            borderRadius: [4, 4, 0, 0]
                        },
                        emphasis: {
                            itemStyle: {
                                opacity: 0.8
                            }
                        }
                    },
                    {
                        name: 'Class 10C',
                        type: 'bar',
                        data: [1, 6, 9, 10, 6],
                        itemStyle: {
                            color: 'rgba(251, 191, 114, 1)',
                            borderRadius: [4, 4, 0, 0]
                        },
                        emphasis: {
                            itemStyle: {
                                opacity: 0.8
                            }
                        }
                    },
                    {
                        name: 'Class 11A',
                        type: 'bar',
                        data: [0, 4, 8, 12, 10],
                        itemStyle: {
                            color: 'rgba(252, 141, 98, 1)',
                            borderRadius: [4, 4, 0, 0]
                        },
                        emphasis: {
                            itemStyle: {
                                opacity: 0.8
                            }
                        }
                    }
                ]
            };
            performanceDistributionChart.setOption(performanceDistributionOption);

            // Student Performance Chart (for modal)
            if (document.getElementById('student-performance-chart')) {
                const studentPerformanceChart = echarts.init(document.getElementById('student-performance-chart'));
                const studentPerformanceOption = {
                    animation: false,
                    tooltip: {
                        trigger: 'axis',
                        backgroundColor: 'rgba(255, 255, 255, 0.8)',
                        borderColor: '#E5E7EB',
                        textStyle: {
                            color: '#1F2937'
                        }
                    },
                    legend: {
                        data: ['Current Term', 'Previous Term'],
                        bottom: 0,
                        textStyle: {
                            color: '#1F2937'
                        }
                    },
                    grid: {
                        left: '3%',
                        right: '3%',
                        top: '3%',
                        bottom: '15%',
                        containLabel: true
                    },
                    xAxis: {
                        type: 'category',
                        data: ['Math', 'Science', 'English', 'History', 'Geography', 'Art'],
                        axisLine: {
                            lineStyle: {
                                color: '#E5E7EB'
                            }
                        },
                        axisLabel: {
                            color: '#6B7280'
                        }
                    },
                    yAxis: {
                        type: 'value',
                        max: 100,
                        axisLine: {
                            show: false
                        },
                        axisLabel: {
                            color: '#6B7280',
                            formatter: '{value}%'
                        },
                        splitLine: {
                            lineStyle: {
                                color: '#F3F4F6'
                            }
                        }
                    },
                    series: [
                        {
                            name: 'Current Term',
                            type: 'bar',
                            data: [85, 78, 92, 75, 80, 88],
                            itemStyle: {
                                color: 'rgba(87, 181, 231, 1)',
                                borderRadius: [4, 4, 0, 0]
                            },
                            emphasis: {
                                itemStyle: {
                                    opacity: 0.8
                                }
                            }
                        },
                        {
                            name: 'Previous Term',
                            type: 'bar',
                            data: [70, 73, 89, 77, 75, 85],
                            itemStyle: {
                                color: 'rgba(251, 191, 114, 1)',
                                borderRadius: [4, 4, 0, 0]
                            },
                            emphasis: {
                                itemStyle: {
                                    opacity: 0.8
                                }
                            }
                        }
                    ]
                };
                studentPerformanceChart.setOption(studentPerformanceOption);
            }

            // Student Attendance Chart (for modal)
            if (document.getElementById('student-attendance-chart')) {
                const studentAttendanceChart = echarts.init(document.getElementById('student-attendance-chart'));
                const studentAttendanceOption = {
                    animation: false,
                    tooltip: {
                        trigger: 'item',
                        backgroundColor: 'rgba(255, 255, 255, 0.8)',
                        borderColor: '#E5E7EB',
                        textStyle: {
                            color: '#1F2937'
                        }
                    },
                    legend: {
                        orient: 'horizontal',
                        bottom: 0,
                        textStyle: {
                            color: '#1F2937'
                        }
                    },
                    series: [
                        {
                            name: 'Attendance',
                            type: 'pie',
                            radius: ['40%', '70%'],
                            avoidLabelOverlap: false,
                            itemStyle: {
                                borderRadius: 8,
                                borderColor: '#fff',
                                borderWidth: 2
                            },
                            label: {
                                show: false,
                                position: 'center'
                            },
                            emphasis: {
                                label: {
                                    show: true,
                                    fontSize: '16',
                                    fontWeight: 'bold'
                                }
                            },
                            labelLine: {
                                show: false
                            },
                            data: [
                                { value: 92, name: 'Present', itemStyle: { color: 'rgba(87, 181, 231, 1)' } },
                                { value: 5, name: 'Absent', itemStyle: { color: 'rgba(252, 141, 98, 1)' } },
                                { value: 3, name: 'Late', itemStyle: { color: 'rgba(251, 191, 114, 1)' } }
                            ]
                        }
                    ]
                };
                studentAttendanceChart.setOption(studentAttendanceOption);
            }

            // Resize charts when window size changes
            window.addEventListener('resize', function() {
                performanceDistributionChart.resize();
                if (document.getElementById('student-performance-chart')) {
                    studentPerformanceChart.resize();
                }
                if (document.getElementById('student-attendance-chart')) {
                    studentAttendanceChart.resize();
                }
            });
        });

        // Custom Checkbox Functionality
        document.addEventListener('DOMContentLoaded', function() {
            const customCheckboxes = document.querySelectorAll('.custom-checkbox-input');
            customCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('click', function() {
                    this.checked = !this.checked;
                });
            });

            // Select All Students checkbox
            const selectAllCheckbox = document.getElementById('selectAllStudents');
            const studentCheckboxes = document.querySelectorAll('.student-checkbox');
            
            if (selectAllCheckbox) {
                selectAllCheckbox.addEventListener('click', function() {
                    const isChecked = this.checked;
                    studentCheckboxes.forEach(checkbox => {
                        checkbox.checked = isChecked;
                    });
                });
            }
        });

        // Student Profile Modal
        document.addEventListener('DOMContentLoaded', function() {
            const studentRows = document.querySelectorAll('tr[data-student-id]');
            const studentModal = document.getElementById('studentProfileModal');
            const studentModalOverlay = document.getElementById('studentModalOverlay');
            const closeStudentModalBtn = document.getElementById('closeStudentModal');
            
            studentRows.forEach(row => {
                row.addEventListener('click', function(e) {
                    // Don't open modal if clicking on checkboxes or action buttons
                    if (e.target.closest('.custom-checkbox') || e.target.closest('button')) {
                        return;
                    }
                    
                    studentModal.style.display = 'block';
                    studentModalOverlay.style.display = 'block';
                    document.body.style.overflow = 'hidden';
                    
                    // Initialize charts if they exist
                    if (window.echarts) {
                        if (document.getElementById('student-performance-chart')) {
                            window.echarts.getInstanceByDom(document.getElementById('student-performance-chart')).resize();
                        }
                        if (document.getElementById('student-attendance-chart')) {
                            window.echarts.getInstanceByDom(document.getElementById('student-attendance-chart')).resize();
                        }
                    }
                });
            });
            
            if (closeStudentModalBtn) {
                closeStudentModalBtn.addEventListener('click', function() {
                    studentModal.style.display = 'none';
                    studentModalOverlay.style.display = 'none';
                    document.body.style.overflow = '';
                });
            }
            
            if (studentModalOverlay) {
                studentModalOverlay.addEventListener('click', function() {
                    studentModal.style.display = 'none';
                    studentModalOverlay.style.display = 'none';
                    document.body.style.overflow = '';
                });
            }
        });

        // Add Student Modal
        document.addEventListener('DOMContentLoaded', function() {
            const addStudentBtn = document.getElementById('addStudentBtn');
            const addStudentModal = document.getElementById('addStudentModal');
            const addStudentModalOverlay = document.getElementById('addStudentModalOverlay');
            const closeAddStudentModalBtn = document.getElementById('closeAddStudentModal');
            const cancelAddStudentBtn = document.getElementById('cancelAddStudent');
            
            if (addStudentBtn) {
                addStudentBtn.addEventListener('click', function() {
                    addStudentModal.style.display = 'block';
                    addStudentModalOverlay.style.display = 'block';
                    document.body.style.overflow = 'hidden';
                });
            }
            
            if (closeAddStudentModalBtn) {
                closeAddStudentModalBtn.addEventListener('click', function() {
                    addStudentModal.style.display = 'none';
                    addStudentModalOverlay.style.display = 'none';
                    document.body.style.overflow = '';
                });
            }
            
            if (cancelAddStudentBtn) {
                cancelAddStudentBtn.addEventListener('click', function() {
                    addStudentModal.style.display = 'none';
                    addStudentModalOverlay.style.display = 'none';
                    document.body.style.overflow = '';
                });
            }
            
            if (addStudentModalOverlay) {
                addStudentModalOverlay.addEventListener('click', function() {
                    addStudentModal.style.display = 'none';
                    addStudentModalOverlay.style.display = 'none';
                    document.body.style.overflow = '';
                });
            }
        });
    </script>
</body>
</html>
