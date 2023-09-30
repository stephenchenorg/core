<?php

namespace Stephenchen\Core\Http\Backend\Member;

use Carbon\Carbon;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Exceptions\RepositoryException;
use Stephenchen\Core\Base\BaseRepository;

class MemberRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return config('stephenchen-core-config.member_class') ?? MemberModel::class;
    }

    /**
     * Boot up the repository, pushing criteria
     *
     * @throws RepositoryException
     */
    public function boot(): void
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function firstWhereAccountOrEmail(?string $email, ?string $account)
    {
        return $this
            ->newModelQuery()
            ->where('email', $email)
            ->orWhere('account', $account)
            ->first();
    }

    /**
     * When user login, update member metric, default is `latest_ip` and `latest_login_at` you can also
     * assign other parameters
     *
     * @array
     */
    public function updateMemberMetric(array $otherParameters): bool
    {
        $defaultMetric = [
            // Beware!!! , If you are using CloudFlare, please see this first
            // https://khalilst.medium.com/get-real-client-ip-behind-cloudflare-in-laravel-189cb89059ff
            'latest_ip' => request()->ip(),
            'latest_login_at' => Carbon::now()->toDateString(),
        ];

        $metric = $defaultMetric + $otherParameters;

        return $this->model->update($metric);
    }
}
