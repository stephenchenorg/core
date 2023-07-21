<?php

namespace Stephenchen\Core\Utilities;

use Stephenchen\Core\Exceptions\NotFoundException;

final class ToTree
{
    /**
     * 把 flatten array 轉成 tree
     *
     * @param array $flattenArray
     * @param string $parentIDName
     * @param int|null $root
     *
     * @return array
     * @throws NotFoundException
     */
    public function convert(array $flattenArray, string $parentIDName, ?int $root = 0): array
    {
        $parents = [];
        foreach ($flattenArray as $flat) {
            if (!Utility::isArrayHasKey($flat, $parentIDName)) {
                throw new NotFoundException("The parent id name $parentIDName is not found");
            }
            $parents[$flat[$parentIDName]][] = $flat;
        }

        // @TIP: If root is null, then set root to "empty string",
        // Because using null as key will result "empty string"
        $root = $root ?? "";

        return $this->createBranch($parents, $parents[$root ?? ""]);
    }

    /**
     * Recursive branch extrusion
     *
     * @param $parents
     * @param $children
     *
     * @return array
     */
    private function createBranch(&$parents, $children): array
    {
        $tree = [];
        foreach ($children as $child) {
            if (isset($parents[$child['id']])) {
                $child['children'] =
                    $this->createBranch($parents, $parents[$child['id']]);
            }
            $tree[] = $child;
        }
        return $tree;
    }
}
