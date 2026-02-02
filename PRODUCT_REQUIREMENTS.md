# Political Campaign Platform — Product Requirements

## Overview
A platform for managing political campaigns where users can register, create candidate profiles, and publish campaign content. Candidate profiles have dedicated URLs and QR codes for sharing, and the platform supports endorsements, mock elections, and administrative review workflows.

## Goals
- Provide a centralized hub for candidates and campaign teams to present manifestos, media, and updates.
- Enable voters to discover candidates by position, geography, and election cycle.
- Support endorsements, claim verification, and mock elections with analytics for campaign strategy.
- Ensure moderation, approvals, and payments for candidate profile creation.

## Personas
- **Candidate**: Public figure contesting an election; wants profile, posts, analytics, and campaign reach.
- **Campaign Manager/Team**: Creates and manages candidate content, media, and approvals.
- **Electorate/Visitor**: Discovers candidates, reads content, endorses, and votes in mock elections.
- **Administrator**: Reviews and approves profiles/posts, moderates content, and handles compliance.

## Core Features
### 1) User Accounts
- Users register and authenticate.
- Users may manage one or more campaign profiles, with roles such as author/editor.
- Campaign accounts can have multiple collaborators (role-based access).
- Accounts are tied to a specific election cycle and must not be reused across cycles.

### 2) Candidate Profiles
- Candidates can be documented by themselves or by authorized campaign managers.
- Candidate profile fields include:
  - Name, position contested, geography (state, senatorial zone, constituency).
  - Manifesto sections (education, economy, security, etc.).
  - Media: images, YouTube links, campaign songs, etc.
- Each candidate profile has:
  - A dedicated URL that is scoped to an election cycle (e.g., `site.com/candidate/ab-2024`).
  - A QR code linking to the candidate URL.
- Profiles require admin approval and payment before publishing.
  - Profiles remain accessible after the election cycle for historical reference and governance accountability.

### 3) Positions and Geography
- Supported positions: President, Governor, Senate, House of Representatives, State House of Assembly.
- Geography hierarchy:
  - Country → State → (Senatorial Districts / House of Reps Constituencies / State Assembly Constituencies).
  - Consider adding polling units and results collection zones for richer analytics if needed.
- State pages list candidates for Governor, Senate, House of Reps, and State Assembly.
- National pages list candidates by position (e.g., all presidential candidates).

### 4) Campaign Content & Posts
- Post types: text only, text + images, text + videos (YouTube links).
- Campaign posts are visible on:
  - Candidate profile pages.
  - Landing page feeds segmented by position (e.g., President, Governor, Senate, etc.).
- Posts can be shared to social platforms once approved (Twitter, Instagram, Facebook, YouTube channel).

### 5) Endorsements & Claim Verification
- Visitors can endorse candidates.
- Visitors can verify or dispute claims made by candidates (e.g., “did this” / “did not do this”).
- Engagement metrics should be visible to candidates and campaign teams.

### 6) Candidate Comparisons
- Visitors can compare two candidates side-by-side by manifesto category (e.g., education, security, economy).
- Comparisons should be a prominent discovery feature for electorates.

### 7) Mock Elections
- One-person-one-vote per election/constituency (enforce via email + IP or similar).
- Mock elections available per constituency/state/position.
- Results and analytics show strengths/weaknesses by geography.

### 8) Analytics & Map Visualization
- Candidates can view endorsement strength by geography.
- A map visualization shows color-coded strength by area (similar to electoral maps).
- Comparisons between candidates (relative share by region).
- Collect and display voter residence vs. voting location to assess support by origin and by where votes are cast.

### 9) Admin & Moderation
- Admins approve/reject candidate profiles.
- Admins review and flag posts (hate speech, unverified allegations, etc.).
- AI-assisted moderation to flag risky content for review.
- Admin interface for managing approvals, disputes, and payments.

### 10) Platform Content
- Voter education articles.
- Electoral body announcements and clarifications.
- General news not tied to a candidate.
- Site-level social media links for the platform.
- State-level social media accounts that publish state-specific contestant updates, mirrored on state pages.

## Non-Functional Requirements
- Role-based access control with audit trails.
- Secure payment processing for profile approval.
- Anti-abuse measures (duplicate accounts, false claims, and vote manipulation).
- Scalability for high traffic during election seasons.
- Accessibility and mobile responsiveness.

## Open Questions
- Initial country: Nigeria; confirm how election cycles are modeled and scheduled.
- Required payment methods: Paystack and Flutterwave (card payments).
- How should “claim verification” be surfaced and moderated?
- Social platform APIs for automated sharing: Facebook Graph API, Instagram API, and X API.
- Map data source: Nigeria national map data accessible via public internet sources.
