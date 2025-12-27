<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create attendance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/attendee.css') }}">
</head>

<body>
    <div class="container">
        <div class="main-card">
            <div class="card-header">
                <h1 class="card-title">
                    <i class="fas fa-user-check"></i>
                    Add New Attendance
                </h1>
            </div>

            <div class="card-body">
                <!-- Progress Indicator -->
                <div class="progress-indicator">
                    <div class="progress-step active" id="step1">
                        <div class="step-circle">1</div>
                        <div class="step-label">Select Activity</div>
                    </div>
                    <div class="progress-step" id="step2">
                        <div class="step-circle">2</div>
                        <div class="step-label">Choose Person</div>
                    </div>
                    <div class="progress-step" id="step3">
                        <div class="step-circle">3</div>
                        <div class="step-label">Set Status</div>
                    </div>
                </div>

                <form id="attendanceForm" action="{{ route('attendees.store') }}" method="POST">
                    @csrf

                    <!-- Step 1: Activity Selection -->
                    <div class="form-section mb-5">
                        <label for="activity_id" class="form-label">
                            <i class="fas fa-dumbbell"></i>
                            Select Activity
                        </label>
                        <select class="form-select form-select-lg" id="activity_id" name="activity_id" required>
                            <option value="" selected disabled>-- Please select an activity --</option>
                            @foreach ($activities as $activity)
                                <option value="{{ $activity->id }}">{{ $activity->name }}</option>
                            @endforeach
                        </select>
                        <div class="form-text mt-2" style="color: var(--text-secondary);">
                            <i class="fas fa-info-circle me-2"></i>
                            Choose the activity to view registered participants
                        </div>
                    </div>

                    <!-- Step 2: Participants List -->
                    <div class="form-section mb-5" id="bookingsSection" style="display: none;">
                        <label class="form-label">
                            <i class="fas fa-users"></i>
                            Registered Participants
                        </label>

                        <div id="loadingSpinner" class="loading-spinner" style="display: none;">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <p class="mt-3">Loading participants...</p>
                        </div>

                        <div id="bookingsList" class="bookings-grid">
                            <!-- Will be populated via AJAX -->
                        </div>

                        <input type="hidden" id="selected_booking_id" name="booking_id" required>
                    </div>

                    <!-- Step 3: Attendance Status -->
                    <div class="form-section mb-5" id="statusSection" style="display: none;">
                        <label class="form-label">
                            <i class="fas fa-clipboard-check"></i>
                            Attendance Status
                        </label>

                        <div class="status-selection">
                            <div class="status-option" data-status="1">
                                <div class="status-icon">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                                <div class="status-text">
                                    <h5>Present</h5>
                                    <p>Attended the activity</p>
                                </div>
                            </div>

                            <div class="status-option" data-status="0">
                                <div class="status-icon">
                                    <i class="fas fa-times-circle"></i>
                                </div>
                                <div class="status-text">
                                    <h5>Absent</h5>
                                    <p>Did not attend</p>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" id="status" name="status" required>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary btn-lg" id="submitBtn" style="display: none;">
                            <i class="fas fa-save me-2"></i>
                            Save Attendance
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            let selectedBookingId = null;
            let selectedStatus = null;
            let currentActivityId = null;

            // Update progress indicator
            function updateProgress(currentStep) {
                $('.progress-step').removeClass('active');
                $(`#step${currentStep}`).addClass('active');
            }

            // When activity changes
            $('#activity_id').change(function() {
                currentActivityId = $(this).val();

                if (currentActivityId) {
                    // Show participants section
                    $('#bookingsSection').show();
                    $('#loadingSpinner').show();
                    $('#bookingsList').empty();
                    
                    // Hide other sections
                    $('#statusSection').hide();
                    $('#submitBtn').hide();
                    
                    // Reset values
                    selectedBookingId = null;
                    selectedStatus = null;
                    $('#selected_booking_id').val('');
                    $('#status').val('');
                    
                    // Reset selection
                    $('.booking-card').removeClass('selected');
                    $('.status-option').removeClass('active inactive');
                    
                    // Update progress
                    updateProgress(2);

                    // Fetch participants via AJAX
                    $.ajax({
                        url: '/attendees/get-bookings/' + currentActivityId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(bookings) {
                            $('#loadingSpinner').hide();

                            if (bookings.length > 0) {
                                let html = '';

                                bookings.forEach(function(booking) {
                                    html += `
                                    <div class="booking-card" data-booking-id="${booking.id}">
                                        <div class="checkmark">
                                            <i class="fas fa-check"></i>
                                        </div>
                                        <div class="user-avatar">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <div class="user-info">
                                            <h5>${booking.user_name}</h5>
                                            <p>${booking.user_email}</p>
                                            ${booking.user_phone ? `<p><i class="fas fa-phone me-1"></i>${booking.user_phone}</p>` : ''}
                                        </div>
                                    </div>
                                `;
                                });

                                $('#bookingsList').html(html);
                            } else {
                                $('#bookingsList').html(`
                                    <div class="alert alert-warning">
                                        <i class="fas fa-users-slash me-2"></i>
                                        No participants registered for this activity
                                    </div>
                                `);
                            }
                        },
                        error: function(xhr, status, error) {
                            $('#loadingSpinner').hide();
                            console.error('Error:', error);
                            $('#bookingsList').html(`
                                <div class="alert alert-danger">
                                    <i class="fas fa-exclamation-triangle me-2"></i>
                                    Error loading data. Please try again.
                                </div>
                            `);
                        }
                    });
                } else {
                    $('#bookingsSection').hide();
                    $('#statusSection').hide();
                    $('#submitBtn').hide();
                    updateProgress(1);
                }
            });

            // When selecting a participant
            $(document).on('click', '.booking-card', function() {
                $('.booking-card').removeClass('selected');
                $(this).addClass('selected');

                selectedBookingId = $(this).data('booking-id');
                $('#selected_booking_id').val(selectedBookingId);

                // Show status section
                $('#statusSection').show();
                $('#submitBtn').hide();
                
                // Update progress
                updateProgress(3);
            });

            // When selecting attendance status
            $(document).on('click', '.status-option', function() {
                $('.status-option').removeClass('active inactive');

                const status = $(this).data('status');
                selectedStatus = status;
                $('#status').val(status);

                if (status == 1) {
                    $(this).addClass('active');
                    $('.status-option[data-status="0"]').addClass('inactive');
                } else {
                    $(this).addClass('active');
                    $('.status-option[data-status="1"]').addClass('inactive');
                }

                // Show submit button if everything is selected
                if (selectedBookingId && selectedStatus !== null) {
                    $('#submitBtn').show();
                }
            });

            // Prevent form submission if not all steps are completed
            $('#attendanceForm').submit(function(e) {
                if (!selectedBookingId || selectedStatus === null) {
                    e.preventDefault();
                    alert('Please complete all steps before submitting.');
                }
            });

            // Initialize progress indicator
            updateProgress(1);
        });
    </script>
</body>
</html>