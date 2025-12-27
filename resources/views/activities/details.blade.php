<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $activity->name }} - Details</title>
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml;base64,PHN2ZyBmaWxsPSIjMDVDMUY3IiBoZWlnaHQ9IjY0cHgiIHdpZHRoPSI2NHB4IiB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHZpZXdCb3g9IjAgMCAzMjYuODUgMzI2Ljg1IiB4bWw6c3BhY2U9InByZXNlcnZlIj48ZyBpZD0iU1ZHUmVwb19iZ0NhcnJpZXIiIHN0cm9rZS13aWR0aD0iMCI+PC9nPjxnIGlkPSJTVkdSZXBvX3RyYWNlckNhcnJpZXIiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCI+PC9nPjxnIGlkPSJTVkdSZXBvX2ljb25DYXJyaWVyIj4gPHBhdGggZD0iTTI2NC42OTMsMzI2Ljg0NWgtMzguMDc5Yy00LjQxOCwwLTgtMy41ODItOC04di0zMC40NjRIMTA4LjIzMXYzMC40NjRjMCw0LjQxOC0zLjU4Miw4LTgsOEg2Mi4xNTJjLTQuNDE4LDAtOC0zLjU4Mi04LTh2LTYuOTM5SDI0LjA3NGMtNC40MTgsMC04LTMuNTgyLTgtOHYtNzkuODc1YzAtNC40MTgsMy41ODItOCw4LThoMzAuMDc3di02LjkzOGMwLTQuNDE4LDMuNTgyLTgsOC04aDM4LjA3OWM0LjQxOCwwLDgsMy41ODIsOCw4djMwLjQ2NGgxMTAuMzg0di0zMC40NjRjMC00LjQxOCwzLjU4Mi04LDgtOGgzOC4wNzljNC40MTgsMCw4LDMuNTgyLDgsOHY2LjkzOGgzMC4wNzdjNC40MTgsMCw4LDMuNTgyLDgsOHY3OS44NzVjMCw0LjQxOC0zLjU4Miw4LTgsOGgtMzAuMDc3djYuOTM5QzI3Mi42OTMsMzIzLjI2MywyNjkuMTEyLDMyNi44NDUsMjY0LjY5MywzMjYuODQ1eiBNMjM0LjYxNSwzMTAuODQ1aDIyLjA3OXYtOTMuNzUzaC0yMi4wNzlWMzEwLjg0NXogTTcwLjE1MiwzMTAuODQ1aDIyLjA3OXYtOTMuNzUzSDcwLjE1MlYzMTAuODQ1eiBNMjcyLjY5MywyOTUuOTA1aDIyLjA3N1YyMzIuMDNoLTIyLjA3N1YyOTUuOTA1eiBNMzIuMDc0LDI5NS45MDVoMjIuMDc3VjIzMi4wM0gzMi4wNzRWMjk1LjkwNXogTTEwOC4yMzEsMjcyLjM4MWgxMTAuMzg0di0xNi44MjVIMTA4LjIzMVYyNzIuMzgxeiBNMTQ1LjQ0MywyMjMuMzc2Yy0xLjMzMSwwLTIuNjgtMC4zMzItMy45MjItMS4wMzJjLTMuODQ5LTIuMTctNS4yMDktNy4wNS0zLjA0LTEwLjg5OGMxNC4yNzMtMjUuMzEyLDMzLjU0My00Ni43MTIsNTYuMjE0LTYzLjE4MWMtOS44OTQtMTMuNzAzLTIxLjE5Ny0yNi4xNzMtMzMuNjgxLTM3LjIyN2MtMzEuMDE5LDMzLjQwMy03My4zNTUsNTUuODk2LTEyMC4zOTUsNjEuNTk5YzEuMDQyLDQuMjA5LDIuMzAzLDguMzY4LDMuNzg0LDEyLjQ2OGMxLjUwMSw0LjE1NS0wLjY1LDguNzQxLTQuODA2LDEwLjI0MmMtNC4xNTgsMS41MDItOC43NDEtMC42NTEtMTAuMjQyLTQuODA3Yy01LjU3MS0xNS40MjQtOC4zOTYtMzEuNTk5LTguMzk2LTQ4LjA3N0MyMC45NTksNjMuOTA4LDg0Ljg2OCwwLDE2My40MjMsMGM3OC41NTQsMCwxNDIuNDYyLDYzLjkwOCwxNDIuNDYyLDE0Mi40NjNjMCwxNC4xNzktMi4xMDQsMjguMjAxLTYuMjU1LDQxLjY4Yy0xLjMwMSw0LjIyMy01Ljc4LDYuNTg5LTEwLDUuMjkxYy00LjIyMy0xLjMtNi41OTEtNS43NzctNS4yOTEtMTBjMy42OC0xMS45NTEsNS41NDYtMjQuMzksNS41NDYtMzYuOTcxYzAtNC44NjktMC4yNzYtOS42NzMtMC44MTQtMTQuNGMtMjUuODcxLDIuOTk3LTUwLjQwMywxMS41MjEtNzIuMTcyLDI0LjY2MmM0LjcxMyw3LjUwNCw5LjAxNywxNS4yNTMsMTIuODczLDIzLjIwMmMxLjkyOCwzLjk3NSwwLjI2OSw4Ljc2MS0zLjcwNiwxMC42ODljLTMuOTc1LDEuOTI1LTguNzYyLDAuMjY5LTEwLjY4OS0zLjcwN2MtMy41NzMtNy4zNjYtNy41MDEtMTQuNDg2LTExLjc2MS0yMS4zNDFjLTIwLjYyOSwxNS4wOTEtMzguMTc1LDM0LjY0Mi01MS4xOTYsNTcuNzM2QzE1MC45NDgsMjIxLjkxMSwxNDguMjM2LDIyMy4zNzYsMTQ1LjQ0MywyMjMuMzc2eiBNNjYuNjAxLDYxLjE5M2MtMTguNDkyLDIxLjk5NC0yOS42NDIsNTAuMzU0LTI5LjY0Miw4MS4yN2MwLDQuODM0LDAuMjc0LDkuNjM5LDAuODE5LDE0LjM5OWM0My4yNTctNS4wMTksODIuMjMzLTI1LjQ4NCwxMTAuODczLTU2LjAxMkMxMjQuNTU1LDgyLjM5MSw5Ni43Niw2OC44MTQsNjYuNjAxLDYxLjE5M3ogTTE3MS4zMjksOTguOTk4YzEzLjYyNSwxMi4wNDgsMjUuOTM2LDI1LjY2NCwzNi42MTEsNDAuNDQyYzIzLjU5OC0xNC4zNzgsNTAuMjE4LTIzLjc1OCw3OC4zMDctMjcuMTU1Yy05Ljk4Ny00MC42MzUtMzkuNjY3LTczLjYxNS03OC4yOTktODguMTk0QzIwMS4xMjUsNTEuOTM3LDE4OC40MzMsNzcuMzMzLDE3MS4zMjksOTguOTk4eiBNNzkuMzIxLDQ4LjA5NmMyOC42ODIsOC40NTgsNTUuOTE0LDIyLjM1Nyw3OS42ODEsNDAuNzA5YzE1Ljc3MS0yMC4wNjUsMjcuNDM1LTQzLjYwNiwzMy42Mi02OS40MDJDMTgzLjI0OCwxNy4xNzksMTczLjQ2OCwxNiwxNjMuNDIzLDE2QzEzMS4xNjIsMTYsMTAxLjY4NiwyOC4xNCw3OS4zMjEsNDguMDk2eiI+PC9wYXRoPiA8L2c+PC9zdmc+">
        
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #0F172A 0%, #1E293B 100%);
            color: #fff;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .main-card {
            width: 100%;
            max-width: 900px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.4);
            border: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
        }

        /* Header */
        .card-header {
            background: linear-gradient(135deg, #05C1F7 0%, #0D9BC2 100%);
            padding: 30px;
            position: relative;
        }

        .back-btn {
            position: absolute;
            top: 20px;
            left: 20px;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 20px;
            cursor: pointer;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 5px;
            transition: all 0.3s ease;
        }

        .back-btn:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        .activity-title {
            font-size: 2rem;
            text-align: center;
            margin-top: 10px;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        /* Card Content */
        .card-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0;
            min-height: 500px;
        }

        /* Left Column */
        .left-column {
            padding: 30px;
            border-right: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            flex-direction: column;
            gap: 25px;
        }

        .activity-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        }

        .description-box {
            background: rgba(255, 255, 255, 0.03);
            padding: 20px;
            border-radius: 15px;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .description-title {
            color: #05C1F7;
            margin-bottom: 10px;
            font-size: 1.2rem;
        }

        .description-text {
            color: #CBD5E1;
            line-height: 1.6;
        }

        .details-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }

        .detail-item {
            background: rgba(255, 255, 255, 0.03);
            padding: 15px;
            border-radius: 10px;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .detail-icon {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .detail-label {
            font-size: 0.9rem;
            color: #94A3B8;
            margin-bottom: 5px;
        }

        .detail-value {
            font-size: 1.1rem;
            font-weight: 600;
        }

        /* Right Column - Coaches */
        .right-column {
            padding: 30px;
            background: rgba(255, 255, 255, 0.02);
            overflow-y: auto;
            max-height: 500px;
        }

        .coaches-title {
            color: #05C1F7;
            margin-bottom: 25px;
            font-size: 1.3rem;
            text-align: center;
        }

        .coach-card {
            background: rgba(255, 255, 255, 0.03);
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 15px;
            border: 1px solid rgba(255, 255, 255, 0.05);
            transition: all 0.3s ease;
        }

        .coach-card:hover {
            background: rgba(255, 255, 255, 0.05);
            border-color: rgba(5, 193, 247, 0.3);
            transform: translateY(-3px);
        }

        .coach-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .coach-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .coach-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #05C1F7;
        }

        .coach-text h4 {
            font-size: 1.1rem;
            margin-bottom: 5px;
        }

        .coach-text p {
            color: #94A3B8;
            font-size: 0.9rem;
        }

        .coach-price {
            text-align: right;
        }

        .price-tag {
            font-size: 1.5rem;
            font-weight: bold;
            color: #05C1F7;
            text-shadow: 0 2px 10px rgba(5, 193, 247, 0.3);
        }

        .price-label {
            font-size: 0.8rem;
            color: #94A3B8;
        }

        .coach-stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
            margin-bottom: 15px;
        }

        .stat {
            text-align: center;
            padding: 10px;
            background: rgba(255, 255, 255, 0.02);
            border-radius: 8px;
        }

        .stat-label {
            font-size: 0.8rem;
            color: #94A3B8;
            margin-bottom: 5px;
        }

        .stat-value {
            font-size: 0.9rem;
            font-weight: 600;
        }

        .book-btn {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #05C1F7 0%, #0D9BC2 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .book-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(5, 193, 247, 0.4);
        }

        /* Footer */
        .card-footer {
            padding: 20px;
            background: rgba(255, 255, 255, 0.02);
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            text-align: center;
            color: #94A3B8;
            font-size: 0.9rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .card-content {
                grid-template-columns: 1fr;
            }
            
            .left-column {
                border-right: none;
                border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            }
            
            .details-grid {
                grid-template-columns: 1fr;
            }
            
            .coach-stats {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        .no-coaches {
            text-align: center;
            padding: 40px;
            color: #94A3B8;
        }

        .no-coaches h3 {
            color: #05C1F7;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="main-card">
        <!-- Header -->
        <div class="card-header">
            <button onclick="window.history.back()" class="back-btn">
                ← Back
            </button>
            <h1 class="activity-title">{{ $activity->name }}</h1>
        </div>

        <!-- Main Content -->
        <div class="card-content">
            <!-- Left Column -->
            <div class="left-column">
                <!-- Activity Image -->
                <div>
                    @if($activity->image && file_exists(public_path('images/activities/' . $activity->image)))
                        <img src="{{ asset('images/activities/' . $activity->image) }}" 
                             alt="{{ $activity->name }}" class="activity-image">
                    @else
                        <img src="https://images.unsplash.com/photo-1534367507877-0edd93bd013b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" 
                             alt="{{ $activity->name }}" class="activity-image">
                    @endif
                </div>

                <!-- Description -->
                <div class="description-box">
                    <h3 class="description-title">About This Course</h3>
                    <p class="description-text">
                        {{ $activity->description ?: 'Professional training course with expert coaches. Suitable for all levels from beginner to advanced.' }}
                    </p>
                </div>

                <!-- Details -->
                <div class="details-grid">
                    <div class="detail-item">
                        <div class="detail-icon">⏱️</div>
                        <div class="detail-label">Duration</div>
                        <div class="detail-value">60-90 min</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-icon">🎯</div>
                        <div class="detail-label">Level</div>
                        <div class="detail-value">{{ $activity->level ?? 'All Levels' }}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-icon">🏢</div>
                        <div class="detail-label">Facility</div>
                        <div class="detail-value">{{ $activity->facility->room_name ?? 'Main Gym' }}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-icon">✅</div>
                        <div class="detail-label">Status</div>
                        <div class="detail-value">{{ $activity->is_active ? 'Active' : 'Inactive' }}</div>
                    </div>
                </div>
            </div>

            <!-- Right Column - Coaches -->
            <div class="right-column">
    <h3 class="coaches-title">👨‍🏫 Available Coaches</h3>
    
    @if(!empty($coaches) && count($coaches) > 0)
        <!-- إضافة تصحيح -->
        <div style="display: none; color: white; background: red; padding: 10px; margin-bottom: 20px;">
            <strong>Debug Info:</strong><br>
            @foreach($coaches as $coach)
                Coach: {{ $coach['name'] }}<br>
                Image URL: {{ $coach['image'] ?? 'NO IMAGE' }}<br>
                Has image: {{ !empty($coach['image']) ? 'YES' : 'NO' }}<br>
                <hr>
            @endforeach
        </div>
        
        @foreach($coaches as $coach)
            <div class="coach-card">
                <div class="coach-top">
                    <div class="coach-info">
                        <!-- **استخدم $coach['image'] مباشرة لأنه أصبح URL كامل** -->
                        <img src="{{ $coach['image'] }}" 
                             alt="{{ $coach['name'] }}" class="coach-avatar"
                             onerror="this.onerror=null; this.src='https://ui-avatars.com/api/?name={{ urlencode($coach['name']) }}&background=05C1F7&color=fff&size=128';">
                        
                        <div class="coach-text">
                            <h4>{{ $coach['name'] }}</h4>
                            <p>{{ $coach['specialization'] ?? 'Professional Coach' }}</p>
                        </div>
                    </div>
                    
                    <div class="coach-price">
                        <div class="price-tag">{{ $coach['formatted_price'] }}</div>
                        <div class="price-label">Full Course</div>
                    </div>
                </div>
                
                <div class="coach-stats">
                    <div class="stat">
                        <div class="stat-label">Experience</div>
                        <div class="stat-value">{{ $coach['experience'] ?? 'N/A' }}</div>
                    </div>
                    <div class="stat">
                        <div class="stat-label">Rating</div>
                        <div class="stat-value">
                            @php
                                $rating = 4.8;
                            @endphp
                            ⭐ {{ number_format($rating, 1) }}
                        </div>
                    </div>
                    <div class="stat">
                        <div class="stat-label">Students</div>
                        <div class="stat-value">
                            {{ $coach['student_count'] ?? 0 }}+
                        </div>
                    </div>
                </div>
                
                <button class="book-btn" onclick="bookCourse({{ $activity->id }}, {{ $coach['id'] }})">
                    Book with {{ explode(' ', $coach['name'])[0] }}
                </button>
            </div>
        @endforeach
    @else
        <div class="no-coaches">
            <h3>No Coaches Available</h3>
            <p>Please check back later or contact support.</p>
        </div>
    @endif
</div>
        </div>

        <!-- Footer -->
        <div class="card-footer">
            <p>📞 Need help? Call +962 79 123 4567 | ✉️ fitness_club@gmail.com</p>
        </div>
    </div>

    <script>
        function bookCourse(activityId, coachId) {
            alert(`Booking activity ${activityId} with coach ${coachId}\nThis would redirect to booking page.`);
        }
    </script>
</body>
</html>