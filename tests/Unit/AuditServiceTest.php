<?php

namespace Tests\Unit;

use App\Models\AuditLog;
use App\Services\AuditService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuditServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_log_creates_audit_row(): void
    {
        AuditService::log('test.action', 'Testing audit', null, ['foo' => 'bar']);
        $this->assertSame(1, AuditLog::count());
        $log = AuditLog::first();
        $this->assertSame('test.action', $log->action);
        $this->assertSame(['foo' => 'bar'], $log->meta);
    }
}